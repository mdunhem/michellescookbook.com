/*!
 * Dunhem Recipe website plugin
 * Used to wrap all JS logic into one class to keep it cleaner
 * and readable rather than have a bunch of scattered code
 * @author Mikael Dunhem
 * @version 0.1.9
 * Licensed under the MIT license
 */

;(function ( $, window, document, undefined ) {

    // Recipe constructor
    var Recipe = function( element, options ){
        // Copy in the parameters and assign to public variables
        //this.element = element;
        // A jQuery object wrapper convenience variable
        this.element = $(element);
        // Extend the defaults with any passed in options
        this.options = $.extend( {}, this.defaults, options);

        // Perform init function which is a Prototype function
        this.init();

    };

    Recipe.prototype = {
        // The default constructor function for this prototype
        constructor: Recipe,

        // Initial default variables
        // TODO: Change all data attributes to data-role=...
        // e.g. data-role="element", data-role="addToggle"
        defaults: {
            isInitialized: undefined,
            // Selector for auto initialization
            initSelector: '[data-role="recipe"]',
            // RegEx to search each input's name attribute
            // Used to seperate out the data[_][_][_] name
            // and replace the middle array location number
            nameSelectorMatch: /\[\w+\]/g,
            // Name attribute data to be used to search for inputs
            nameAttributeData: '[name*="data"]',
            // RegEx to search each input's id attribute
            // Used to seperate out the array location number
            idSelectorMatch: /\D+/g,
            // Data selector for form elements to be copied
            targetSelector: '[data-target="element"]',
            // Input selector
            inputSelector: '[data-target="input"]',
            // Data selector for the div that all new form
            // elements will be appended to
            bodyTarget: '[data-target="body"]',
            // Data selector for add button
            addToggleSelector: '[data-toggle="add"]',
            // Data selector for delete button
            deleteToggleSelector: '[data-toggle="delete"]',
            // Data selector to determine what type of form
            // element this is
            typeSelector: 'type',
            // URL to remove/delete function
            deleteURL: '/recipes/deleteIngredientOrDirection/',
            // Copy of the form elements that will be used to be
            // cloned. If undefined, will automatically be created
            // based on the targetSelector variable.
            elementTemplate: undefined,
            // If input has been input into element
            userHasEnteredInput: false,
            // Success callback for the ajax response
            success: function(data) {
                console.log(data);
            },
            // Fail callback for ajax resonse
            error: function(jqXHR, textStatus) {
                console.log(jqXHR + ' : ' + textStatus);
            }
        },

        init: function() {
            // First make a copy of the actual HTML that is going to be manipulated
            // Don't want to change the original but rather create a new copy
            this._getElementTemplate();

            // Register the buttons to their respective click function
            this._registerEventHandlers();

            // After init is done, return self
            return this;
        },

        _registerEventHandlers: function() {
            // Since the action function wont have access to the member variables,
            // they must be copied in so that they can be accessed.
            var eventData = { recipe: this };

            // Register add button
            this.element.on(
                'click',
                this.options.addToggleSelector,
                this,
                this._add
            );

            // Register each delete button, this acts the same as .delegate()
            this.element.on(
                'click',
                this.options.deleteToggleSelector,
                eventData,
                this._delete
            );

            // Register when user starts typing to add a new element
            // Replicates iPhone like functionality with forms by adding
            // a new field when a new one is being created
            // this.element.on(
            //     'keyup',
            //     this.options.inputSelector,
            //     this,
            //     function(event) {
            //         if (!event.data.options.userHasEnteredInput) {
            //             if ($(this).val().length >= 1) {
            //                 event.data.options.userHasEnteredInput = true;
            //             }
            //             event.data._add(event);
            //         } //else if ($(this).parent()[0].childNodes.length > 1) {
            //             //event.data._add(event);
            //         //}
            //     }
            // );
        },

        _getElementTemplate: function() {
            if (!this.options.elementTemplate) {
                this.options.elementTemplate = this.element.clone().find(this.options.targetSelector).first();
                // this.options.elementTemplate = $.extend( {}, this.element.find(this.options.targetSelector).first());
                console.log(this.options.elementTemplate);
            } else if (!this.options.elementTemplate instanceof $) {
                this.options.elementTemplate = $(this.options.elementTemplate);
            }
        },

        // Count how many form elements there already are before creating a new one
        _count: function(element, selector) {
            return element.find(selector).size();
        },

        // Add a new form element function
        _add: function(event) {
            event.preventDefault();

            // var that = event.data.recipe,
            var that = event.data,
                newHtml = that.options.elementTemplate.clone(true).hide(),
                // newHtml = $.extend(true, {}, that.options.elementTemplate).clone(true).hide(),
                // Get a new count each time the add button is pressed
                formElementCount = that._count(that.element, that.options.targetSelector);

            that._adjustArrayNumber(newHtml, that, formElementCount, true);

            console.log(that.options.elementTemplate);
            newHtml.appendTo(that.element.find(that.options.bodyTarget)).slideDown('fast');
            // $(that.options.bodyTarget).append(newHtml).slideDown('fast');

            // Make sure to refresh the jquery mobile listview
            $(that.options.bodyTarget).listview('refresh');
        },

        // Recreate the name attribute which is used by CakePHP to populate and
        // save form data to the database
        // TODO: Clean this up. Very clunky and could use a rebuild
        _adjustArrayNumber: function(element, that, count, isNewElement) {
            var newCount;

            element.find(that.options.nameAttributeData).each(function() {
                if ($(this).is('input')) {
                    var $this = $(this),
                        nameArray = $this.attr('name').match(that.options.nameSelectorMatch),
                        idArray = $this.attr('id').match(that.options.idSelectorMatch),
                        currentArrayPosition;

                    if (isNewElement) {
                        if ($this.attr('type') === 'hidden' && nameArray[2] !== '[step_number]') {
                            $this.remove();
                            return;
                        }

                        $this.attr('name', 'data' + nameArray[0] + '[' + count + ']' + nameArray[2]);
                        $this.attr('id', idArray[0] + count + idArray[1]);

                        if (nameArray[2] === '[step_number]') {
                            $this.attr('value', (count + 1));
                        } else {
                            $this.attr('value', '');
                        }
                    } else {
                        currentArrayPosition = parseInt(nameArray[1].substring(1), 10);
                        $this.attr('name', 'data' + nameArray[0] + '[' + (currentArrayPosition - 1) + ']' + nameArray[2]);
                        $this.attr('id', idArray[0] + (currentArrayPosition - 1) + idArray[1]);

                        if (nameArray[2] === '[step_number]') {
                            $this.attr('value', (currentArrayPosition));
                        }
                    }
                }
            });
            if (isNewElement) {
                if (element.find('label')) {
                    element.find('label').text((count + 1));
                }
            } else {
                if (element.find('label')) {
                    newCount = parseInt(element.find('label').text(), 10);
                    element.find('label').text((newCount - 1));
                }
            }
            
        },

        _getElementID: function(element, options) {
            var array = element.attr('name').match(options.nameSelectorMatch);

            if (array[2] === '[id]') {
                return {
                    type: array[0].substring(1, array[0].length - 1),
                    id: element.attr('value')
                };
            }

            return false;
        },

        _delete: function(event) {
            var that = event.data.recipe,
                $this = $(this),
                nextElements = $this.closest(that.options.targetSelector).nextAll(),
                result,
                count;

            // If there is only one element left, don't let user delete it.
            if ($this.closest(that.options.targetSelector).siblings().length) {
                // First check if user really meant to hit delete button
                if (confirm('Are you sure you want to delete this item?')) {
                    // Then check if this a prepopulated item from the server.
                    // Need to send ajax to delete but no need to waste bandwidth
                    // if this an item isn't even saved on the server.
                    if ($this.siblings().attr('type') === 'hidden') {
                        $this.siblings('input').each(function() {
                            result = that._getElementID($(this), that.options);
                            if (result) {
                                that._sendAjax(result, that);
                            }
                        });
                    }

                    if (nextElements.length) {
                        count = nextElements.length;
                        nextElements.each(function () {
                            that._adjustArrayNumber($(this), that.options, count, false);
                            count--;
                        });
                    }

                    // Remove element
                    $this.closest(that.options.targetSelector).slideUp('normal', function() {
                        $(this).remove();
                        $(that.options.bodyTarget).listview('refresh');
                    });
                }
            } else {
                alert('You cannot delete the only item.');
            }

            event.preventDefault();
        },

        _sendAjax: function(elementInfo, recipe) {
            var that = recipe;

            $.ajax({
                type: 'POST',
                url: that.options.deleteURL,
                data: elementInfo,
                dataType: 'json',
                success: function(data) {
                    that.options.success(data);
                },
                error: function(jqXHR, textStatus) {
                    that.options.error(jqXHR, textStatus);
                }
            });
            return false;
        }
    };

    Recipe.defaults = Recipe.prototype.defaults;

    $.fn.recipe = function(options) {
        return this.each(function() {
            new Recipe(this, options);
        });
    };

    // Auto initialize the plugin
    $(function () {
        // console.log(Recipe.prototype.defaults.initSelector);
        $(document).on('pagebeforecreate', function(event) {
            $(this).find(Recipe.prototype.defaults.initSelector).each(function() {
                // console.log(this);
                $(this).recipe();
            });
            // console.log('pagecreate');
            
            // $(this).recipe();
        });
    });


})( jQuery, window, document );
