<?php echo $this->Js->buffer(
    '(function(){
            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: "Warning!",
                // (string | mandatory) the text inside the notification
                text: "' . $message . '",
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true,
                // (int | optional) the time you want it to be alive for before fading out
                time: ""
            });
        })();'
);
?>

<?php /*
<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong><?php echo $message; ?></strong>
</div>
*/ ?>