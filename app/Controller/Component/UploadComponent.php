<?php
/**
 * Upload Component
 *
 */

App::uses('Component', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class UploadComponent extends Component {

    /**
     * Other components utilized by AuthComponent
     *
     * @var array
     */
    public $components = array('Session', 'RequestHandler');

    /**
     * Controller reference
     *
     * @var Controller
     */
    protected $controller = null;

    /**
     * Request Object
     *
     * @var CakeRequest
     */
    protected $request;

    /**
     * Full url to this script
     *
     * @var String
     */
    protected $scriptUrl;

    /**
     * Relative path to upload directory
     *
     * @var String
     */
    protected $uploadFolder;

    /**
     * Array containing reference to all files contained in the upload folder
     *
     * @var Array
     */
    protected $files = array();

    /**
     * Full url to upload directory
     *
     * @var String
     */
    protected $uploadUrl;

    /**
     * 
     *
     * @var String
     */
    protected $paramName = 'files';

    /**
     * Set the following option to 'POST', if your server does not support
     * DELETE requests. This is a parameter sent to the client
     *
     * @var String
     */
    // :
    protected $deleteType = 'DELETE';

    /**
     * 
     *
     * @var String
     */
    protected $accessControlAllowOrigin = '*';

    /**
     * The php.ini settings upload_max_filesize and post_max_size
     * take precedence over the following maxFileSize setting
     *
     * @var int|null
     */
    protected $maxFileSize = null;

    /**
     * 
     *
     * @var int
     */
    protected $minFileSize = 1;

    /**
     * The file types allowed to be uploaded
     *
     * @var String/Regex
     */
    protected $acceptFileTypes = '/.+$/i';

    /**
     * The maximum number of files for the upload directory
     *
     * @var int|null
     */
    protected $maxNumberOfFiles = null;

    /**
     * Set the following option to false to enable resumable uploads
     *
     * @var boolean
     */
    protected $discardAbortedUploads = true;

    /**
     * PHP File Upload error message codes
     * http://php.net/manual/en/features.file-upload.errors.php
     *
     * @var array
     */
    protected $error_messages = array(
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk',
        8 => 'A PHP extension stopped the file upload',
        'max_file_size' => 'File is too big',
        'min_file_size' => 'File is too small',
        'accept_file_types' => 'Filetype not allowed',
        'max_number_of_files' => 'Maximum number of files exceeded',
        'max_width' => 'Image exceeds maximum width',
        'min_width' => 'Image requires a minimum width',
        'max_height' => 'Image exceeds maximum height',
        'min_height' => 'Image requires a minimum height'
    );

    /**
     * Called before the Controller::beforeFilter().
     *
     * @param Controller $controller Controller with components to initialize
     * @return void
     * @link http://book.cakephp.org/2.0/en/controllers/components.html#Component::initialize
     */
    public function initialize(Controller $controller) {
        $this->controller = $controller;
        $this->request = $controller->request;
        $this->uploadFolder = new Folder(APP_DIR . DS . 'Files', true);
        $this->files = $this->uploadFolder->read(true, false);
    }

    /**
     * Called after the Controller::beforeFilter() and before the controller action
     *
     * @param Controller $controller Controller with components to startup
     * @return void
     * @link http://book.cakephp.org/2.0/en/controllers/components.html#Component::startup
     */
    public function startup(Controller $controller) {
    }

    /**
     * Called before the Controller::beforeRender(), and before 
     * the view class is loaded, and before Controller::render()
     *
     * @param Controller $controller Controller with components to beforeRender
     * @return void
     * @link http://book.cakephp.org/2.0/en/controllers/components.html#Component::beforeRender
     */
    public function beforeRender(Controller $controller) {
    }

    /**
     * Called after Controller::render() and before the output is printed to the browser.
     *
     * @param Controller $controller Controller with components to shutdown
     * @return void
     * @link @link http://book.cakephp.org/2.0/en/controllers/components.html#Component::shutdown
     */
    public function shutdown(Controller $controller) {
    }

    /**
     * Called before Controller::redirect().  Allows you to replace the url that will
     * be redirected to with a new url. The return of this method can either be an array or a string.
     *
     * If the return is an array and contains a 'url' key.  You may also supply the following:
     *
     * - `status` The status code for the redirect
     * - `exit` Whether or not the redirect should exit.
     *
     * If your response is a string or an array that does not contain a 'url' key it will
     * be used as the new url to redirect to.
     *
     * @param Controller $controller Controller with components to beforeRedirect
     * @param string|array $url Either the string or url array that is being redirected to.
     * @param integer $status The status code of the redirect
     * @param boolean $exit Will the script exit.
     * @return array|null Either an array or null.
     * @link @link http://book.cakephp.org/2.0/en/controllers/components.html#Component::beforeRedirect
     */
    public function beforeRedirect(Controller $controller, $url, $status = null, $exit = true) {
    }

    protected function setFileDeleteUrl($file) {
        $file->delete_url = $this->script_url
            .'?file='.rawurlencode($file->name);
        $file->delete_type = $this->delete_type;
        if ($file->delete_type !== 'DELETE') {
            $file->delete_url .= '&_method=DELETE';
        }
    }

    // Fix for overflowing signed 32 bit integers,
    // works for sizes up to 2^32-1 bytes (4 GiB - 1):
    protected function fixIntegerOverflow($size) {
        if ($size < 0) {
            $size += 2.0 * (PHP_INT_MAX + 1);
        }
        return $size;
    }

    protected function getFileSize($file_path, $clear_stat_cache = false) {
        if ($clear_stat_cache) {
            clearstatcache();
        }
        return $this->fixIntegerOverflow(filesize($file_path));

    }

    protected function getFileObject($file_name) {
        $file_path = $this->upload_dir.$file_name;
        if (is_file($file_path) && $file_name[0] !== '.') {
            $file = new stdClass();
            $file->name = $file_name;
            $file->size = $this->getFileSize($file_path);
            $file->url = $this->upload_url.rawurlencode($file->name);
            foreach($this->image_versions as $version => $options) {
                if (is_file($options['upload_dir'].$file_name)) {
                    $file->{$version.'_url'} = $options['upload_url']
                        .rawurlencode($file->name);
                }
            }
            $this->setFileDeleteUrl($file);
            return $file;
        }
        return null;
    }

    protected function getFileObjects() {
        return array_values(
            array_filter(
                array_map(
                    array(
                        $this,
                        'getFileObject'
                    ),
                    scandir($this->upload_dir)
                )
            )
        );
    }

    protected function getErrorMessage($error) {
        return array_key_exists($error, $this->error_messages) ?
            $this->error_messages[$error] : $error;
    }

    protected function validate($uploaded_file, $file, $error, $index) {
        if ($error) {
            $file->error = $this->getErrorMessage($error);
            return false;
        }
        if (!$file->name) {
            $file->error = $this->getErrorMessage('missingFileName');
            return false;
        }
        if (!preg_match($this->accept_file_types, $file->name)) {
            $file->error = $this->getErrorMessage('accept_file_types');
            return false;
        }
        if ($uploaded_file && is_uploaded_file($uploaded_file)) {
            $file_size = $this->getFileSize($uploaded_file);
        } else {
            $file_size = $_SERVER['CONTENT_LENGTH'];
        }
        if ($this->max_file_size && (
                $file_size > $this->max_file_size ||
                $file->size > $this->max_file_size)
            ) {
            $file->error = $this->getErrorMessage('max_file_size');
            return false;
        }
        if ($this->min_file_size &&
            $file_size < $this->min_file_size) {
            $file->error = $this->getErrorMessage('min_file_size');
            return false;
        }
        if (is_int($this->max_number_of_files) && (
                count($this->getFileObjects()) >= $this->max_number_of_files)
            ) {
            $file->error = $this->getErrorMessage('max_number_of_files');
            return false;
        }
        list($img_width, $img_height) = @getimagesize($uploaded_file);
        if (is_int($img_width)) {
            if ($this->max_width && $img_width > $this->max_width) {
                $file->error = $this->getErrorMessage('max_width');
                return false;
            }
            if ($this->max_height && $img_height > $this->max_height) {
                $file->error = $this->getErrorMessage('max_height');
                return false;
            }
            if ($this->min_width && $img_width < $this->min_width) {
                $file->error = $this->getErrorMessage('min_width');
                return false;
            }
            if ($this->min_height && $img_height < $this->min_height) {
                $file->error = $this->getErrorMessage('min_height');
                return false;
            }
        }
        return true;
    }

    protected function upcountNameCallback($matches) {
        $index = isset($matches[1]) ? intval($matches[1]) + 1 : 1;
        $ext = isset($matches[2]) ? $matches[2] : '';
        return ' ('.$index.')'.$ext;
    }

    protected function upcountName($name) {
        return preg_replace_callback(
            '/(?:(?: \(([\d]+)\))?(\.[^.]+))?$/',
            array($this, 'upcountNameCallback'),
            $name,
            1
        );
    }

    protected function trimFileName($name, $type, $index) {
        // Remove path information and dots around the filename, to prevent uploading
        // into different directories or replacing hidden system files.
        // Also remove control characters and spaces (\x00..\x20) around the filename:
        $file_name = trim(basename(stripslashes($name)), ".\x00..\x20");
        // Add missing file extension for known image types:
        if (strpos($file_name, '.') === false &&
            preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)) {
            $file_name .= '.'.$matches[1];
        }
        if ($this->discard_aborted_uploads) {
            while(is_file($this->upload_dir.$file_name)) {
                $file_name = $this->upcountName($file_name);
            }
        }
        return $file_name;
    }

    protected function handleFormData($file, $index) {
        // Handle form data, e.g. $_REQUEST['description'][$index]
    }

    protected function handleFileUpload($uploaded_file, $name, $size, $type, $error, $index = null) {
        // Make a temporary file
        $fileName = new File($this->uploadFolder . 'temp.txt');

        $file = new stdClass();
        $file->name = $this->trimFileName($name, $type, $index);
        $file->size = $this->fixIntegerOverflow(intval($size));
        $file->type = $type;
        if ($this->validate($uploaded_file, $file, $error, $index)) {
            $this->handleFormData($file, $index);
            $file_path = $this->upload_dir.$file->name;
            $append_file = !$this->discard_aborted_uploads &&
                is_file($file_path) && $file->size > $this->getFileSize($file_path);
            if ($uploaded_file && is_uploaded_file($uploaded_file)) {
                // multipart/formdata uploads (POST method uploads)
                if ($append_file) {
                    file_put_contents(
                        $file_path,
                        fopen($uploaded_file, 'r'),
                        FILE_APPEND
                    );
                } else {
                    move_uploaded_file($uploaded_file, $file_path);
                }
            } else {
                // Non-multipart uploads (PUT method support)
                file_put_contents(
                    $file_path,
                    fopen('php://input', 'r'),
                    $append_file ? FILE_APPEND : 0
                );
            }
            $file_size = $this->getFileSize($file_path, $append_file);
            if ($file_size === $file->size) {
                if ($this->orient_image) {
                    $this->orient_image($file_path);
                }
                $file->url = $this->upload_url.rawurlencode($file->name);
                foreach($this->image_versions as $version => $options) {
                    if ($this->create_scaled_image($file->name, $options)) {
                        if ($this->upload_dir !== $options['upload_dir']) {
                            $file->{$version.'_url'} = $options['upload_url']
                                .rawurlencode($file->name);
                        } else {
                            $file_size = $this->getFileSize($file_path, true);
                        }
                    }
                }
            } else if ($this->discard_aborted_uploads) {
                unlink($file_path);
                $file->error = 'abort';
            }
            $file->size = $file_size;
            $this->setFileDeleteUrl($file);
        }
        return $file;
    }

    protected function generateResponse($content, $print_response = true) {
        if ($print_response) {
            $json = json_encode($content);
            $redirect = isset($_REQUEST['redirect']) ?
                stripslashes($_REQUEST['redirect']) : null;
            if ($redirect) {
                header('Location: '.sprintf($redirect, rawurlencode($json)));
                return;
            }
            $this->head();
            echo $json;
        }
        return $content;
    }

    public function head() {
        header('Pragma: no-cache');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Content-Disposition: inline; filename="files.json"');
        header('X-Content-Type-Options: nosniff');
        if ($this->access_control_allow_origin) {
            header('Access-Control-Allow-Origin: '.$this->access_control_allow_origin);
            header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
            header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');            
        }
        header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) &&
            (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }
    }

    public function get($print_response = true) {
        $file_name = isset($_REQUEST['file']) ?
            basename(stripslashes($_REQUEST['file'])) : null;
        if ($file_name) {
            $info = $this->getFileObject($file_name);
        } else {
            $info = $this->getFileObjects();
        }
        return $this->generateResponse($info, $print_response);
    }

    public function post($print_response = true) {
        if ($this->request->is('delete')) {
            return $this->delete();
        }
        $upload = isset($this->request->data($this->paramName)) ?
            $this->request->data($this->paramName) : null;
        $info = array();
        if ($upload && is_array($upload['tmp_name'])) {
            // param_name is an array identifier like "files[]",
            // $_FILES is a multi-dimensional array:
            foreach ($upload['tmp_name'] as $index => $value) {
                $info[] = $this->handleFileUpload(
                    $upload['tmp_name'][$index],
                    isset($_SERVER['HTTP_X_FILE_NAME']) ?
                        $_SERVER['HTTP_X_FILE_NAME'] : $upload['name'][$index],
                    isset($_SERVER['HTTP_X_FILE_SIZE']) ?
                        $_SERVER['HTTP_X_FILE_SIZE'] : $upload['size'][$index],
                    isset($_SERVER['HTTP_X_FILE_TYPE']) ?
                        $_SERVER['HTTP_X_FILE_TYPE'] : $upload['type'][$index],
                    $upload['error'][$index],
                    $index
                );
            }
        } elseif ($upload || isset($_SERVER['HTTP_X_FILE_NAME'])) {
            // param_name is a single object identifier like "file",
            // $_FILES is a one-dimensional array:
            $info[] = $this->handleFileUpload(
                isset($upload['tmp_name']) ? $upload['tmp_name'] : null,
                isset($_SERVER['HTTP_X_FILE_NAME']) ?
                    $_SERVER['HTTP_X_FILE_NAME'] : (isset($upload['name']) ?
                        $upload['name'] : null),
                isset($_SERVER['HTTP_X_FILE_SIZE']) ?
                    $_SERVER['HTTP_X_FILE_SIZE'] : (isset($upload['size']) ?
                        $upload['size'] : null),
                isset($_SERVER['HTTP_X_FILE_TYPE']) ?
                    $_SERVER['HTTP_X_FILE_TYPE'] : (isset($upload['type']) ?
                        $upload['type'] : null),
                isset($upload['error']) ? $upload['error'] : null
            );
        }
        return $this->generateResponse($info, $print_response);
    }

    public function delete($print_response = true) {
        $file_name = isset($_REQUEST['file']) ?
            basename(stripslashes($_REQUEST['file'])) : null;
        $file_path = $this->upload_dir.$file_name;
        $success = is_file($file_path) && $file_name[0] !== '.' && unlink($file_path);
        if ($success) {
            foreach($this->image_versions as $version => $options) {
                $file = $options['upload_dir'].$file_name;
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }
        return $this->generateResponse($info, $print_response);
    }
}