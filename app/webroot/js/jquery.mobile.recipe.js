/**
 * (jQuery mobile) jQuery UI Widget-factory plugin for Michelle's Cookbook (for 1.8/9+)
 * Author: @mdunhem (Mikael Dunhem), mikael.dunhem@gmail.com
 * Licensed under the MIT license
 */

;(function ( $, window, document, undefined ) {

    $.widget( "mdunhem.recipes", $.mobile.widget, {
        // Current version
        version: '0.1.0',
        // Might implement this later...
        ready: false,

        //Options to be used as defaults
        options: {
            // Selector used for self-initialization
            initSelector: ':jqmData(recipe="init")',
            // Might implement later...
            namespace: undefined,
            // RegEx to search each input's name attribute
            // Used to seperate out the data[_][_][_] name
            // and replace the middle array location number
            nameSelectorMatch: /\[\w+\]/g,
            // Name attribute data to be used to search for inputs
            nameAttributeSelector: '[name*="data"]',
            // RegEx to search each input's id attribute
            // Used to seperate out the array location number
            idSelectorMatch: /\D+/g,
            // Data selector for form elements to be copied
            targetSelector: ':jqmData(recipe="element")',
            // Input selector
            inputSelector: ':jqmData(recipe="input")',
            // Data selector for the div that all new form
            // elements will be appended to
            bodyTarget: ':jqmData(recipe="body")',
            // Data selector for add button
            addToggleSelector: ':jqmData(recipe="addButton")',
            // Data selector for the save button
            saveToggleSelector: ':jqmData(recipe="saveButton")',
            // Data selector for delete button
            deleteToggleSelector: ':jqmData(recipe="deleteButton")',
            // URL to remove/delete function
            deleteURL: '/deleteIngredientOrDirection/',
            // Copy of the form elements that will be used to be
            // cloned. If undefined, will automatically be created
            // based on the targetSelector variable.
            elementTemplate: undefined,
            // If input has been input into element
            defaultTitle: 'New Ingredient',
            baseSubpageID: 'RecipeSubpage',
            title: undefined,
            added: function(event, self) {
                // self.refresh();
            }
        },

        _create: function() {
            this._getElementTemplate();
            this._registerEventHandlers();

            var self = this;
            // TODO: Maybe fix this find method
            this.element.find('ul').first().each(function() {
                this.id = self.options.baseSubpageID;
            });

            this.ready = true;
        },

        _getElementTemplate: function() {
            if (!this.options.elementTemplate) {
                this.options.elementTemplate = this.element.find(this.options.targetSelector).clone(true, true).first();
            } else if (!this.options.elementTemplate instanceof $) {
                this.options.elementTemplate = $(this.options.elementTemplate);
            }
        },

        _registerEventHandlers: function() {
            // var self = this;
            // this.document.on('pageinit', function() {
            //     $(self.options.bodyTarget).listview('refresh');
            // });
            // Register the Add button
            this._on(this.element.find(this.options.addToggleSelector), {
                click: function(event) {
                    this._add();
                }
            });
            
            // Register initial delete buttons
            this._on(this.element.find(this.options.deleteToggleSelector), {
                click: function(event) {
                    this._delete(event);
                }
            });

            // Check if there are any save buttons
            var self = this;
            this.document.find(this.options.saveToggleSelector).each(function(index, elem) {
                self._on(this, {
                    click: function(event) {
                        self.save(event);
                    }
                })
            });

            // Temporary, for testing purposes
            this._on(this.document.find(this.options.saveToggleSelector), {
                click: function(event) {
                    this.save(event);
                }
            })
            
            // Also register the handler for the template
            // These get passed to each newly created element
            if (this.options.elementTemplate.find(this.options.saveToggleSelector).length) {
                this._on(this.options.elementTemplate.find(this.options.saveToggleSelector), {
                    click: function(event) {
                        this.save(event);
                    }
                });
            }

            this._on(this.options.elementTemplate.find(this.options.deleteToggleSelector), {
                click: function(event) {
                    this._delete(event);
                }
            });
        },

        // Count how many form elements there already are before creating a new one
        _count: function(element, selector) {
            return element.find(selector).size();
        },

        // Add a new form element function
        _add: function() {
            var newHtml = this.options.elementTemplate.clone(true, true).hide(),
                formElementCount = this._count(this.element, this.options.targetSelector);

            this._adjustArrayNumber(newHtml, this, formElementCount, true);

            newHtml.find(':jqmData(recipe="title")').text(this.options.defaultTitle);

            newHtml.appendTo(this.element.find(this.options.bodyTarget));

            // Call refresh twice to prevent flashing the unstyled list
            $(this.options.bodyTarget).listview('refresh');
            $(this.options.bodyTarget).find(':hidden').slideDown('fast');
            $(this.options.bodyTarget).listview('refresh');
            
        },

        // Recreate the name attribute which is used by CakePHP to populate and
        // save form data to the database
        // TODO: Clean this up. Very clunky and could use a rebuild
        _adjustArrayNumber: function(element, that, count, isNewElement) {
            var newCount,
                self = this;

            element.find(this.options.nameAttributeSelector).each(function(index, elem) {
                // if ($(this).is('input')) {
                //     $(this).text('');
                // }
                // if ($(this).is('input')) {
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
                // }
            });
            // if (isNewElement) {
            //     if (element.find('label')) {
            //         element.find('label').text((count + 1));
            //     }
            // } else {
            //     if (element.find('label')) {
            //         newCount = parseInt(element.find('label').text(), 10);
            //         element.find('label').text((newCount - 1));
            //     }
            // }

            // return element;
            
        },

        _getElementID: function(element) {
            var array = element.attr('name').match(this.options.nameSelectorMatch);

            if (array[2] === '[id]') {
                return {
                    type: array[0].substring(1, array[0].length - 1),
                    id: element.attr('value')
                };
            }

            return false;
        },

        _delete: function(event) {
            var self = this,
                buttonPressed = event.target,
                itemToDelete = $(buttonPressed).closest(this.options.targetSelector),
                siblings = itemToDelete.siblings(),
                subpageURL = itemToDelete.find('a').first().attr('href').slice(1);

            if (siblings.length > 1) {
                if (confirm('Are you sure you want to delete this item?')) {
                    // Then check if this a prepopulated item from the server.
                    // Need to send ajax to delete but no need to waste bandwidth
                    // if this an item isn't even saved on the server.
                    if (itemToDelete.find('input:hidden')) {
                        itemToDelete.find('input').each(function() {
                            result = self._getElementID($(this));
                            console.log(result);
                            if (result) {
                                self._sendAjax(result);
                            }
                        });
                    }

                    // if (siblings.length) {
                    //     count = nextElements.length;
                    //     nextElements.each(function () {
                    //         that._adjustArrayNumber($(this), that.options, count, false);
                    //         count--;
                    //     });
                    // }

                    // Remove element
                    itemToDelete.slideUp('normal', function() {
                        self.document.find('div:jqmData(url="' + subpageURL + '")').remove();
                        $(this).remove();
                        $(self.options.bodyTarget).listview('refresh');
                    });
                }
            } else {
                alert('You cannot delete the only item.');
            }
            //     $this = $(this),
            //     parentPage = this.element.closest( ".ui-page" ),
            //     nextElements = $this.closest(that.options.targetSelector).nextAll(),
            //     result,
            //     count;

            // // If there is only one element left, don't let user delete it.
            // if ($this.closest(that.options.targetSelector).siblings().length) {
            //     // First check if user really meant to hit delete button
            //     if (confirm('Are you sure you want to delete this item?')) {
            //         // Then check if this a prepopulated item from the server.
            //         // Need to send ajax to delete but no need to waste bandwidth
            //         // if this an item isn't even saved on the server.
            //         if ($this.siblings().attr('type') === 'hidden') {
            //             $this.siblings('input').each(function() {
            //                 result = that._getElementID($(this), that.options);
            //                 if (result) {
            //                     that._sendAjax(result, that);
            //                 }
            //             });
            //         }

            //         if (nextElements.length) {
            //             count = nextElements.length;
            //             nextElements.each(function () {
            //                 that._adjustArrayNumber($(this), that.options, count, false);
            //                 count--;
            //             });
            //         }

            //         // Remove element
            //         $this.closest(that.options.targetSelector).slideUp('normal', function() {
            //             $(this).remove();
            //             $(that.options.bodyTarget).listview('refresh');
            //         });
            //     }
            // } else {
            //     alert('You cannot delete the only item.');
            // }

            
        },

        _sendAjax: function(elementInfo) {
            $.ajax({
                type: 'POST',
                url: this.options.deleteURL,
                data: elementInfo,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    // this.options.success(data);
                },
                error: function(jqXHR, textStatus) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    // this.options.error(jqXHR, textStatus);
                }
            });
            return false;
        },

        refresh: function() {
            // this.ready = false;
            this._trigger('recipeRefresh');
            // this._registerEventHandlers(true);
        },

        save: function(event) {
            var newTitle,
                name,
                measureAmount,
                measureUnit,
                subpage = $(event.currentTarget).closest( ".ui-page" ),
                parentUrl = subpage.jqmData('url'),
                anchor = this.element.find('a[href="#' + parentUrl + '"]'),
                listParentElement = anchor.closest(':jqmData(recipe="element")'),
                self = this;

            subpage.find(':jqmData(recipe="input")').each(function() {
                var nameMatch = $(this).attr('name').match(self.options.nameSelectorMatch),
                    $this = $(this);

                switch (nameMatch[2]) {
                    case '[name]':
                        name = $this.val();
                        break;
                    case '[measure_amount]':
                        measureAmount = $this.val();
                        break;
                    case '[measure]':
                        measureUnit = $this.val();
                        break;
                    default:
                        break;
                }

            });

            if (measureAmount.length) {
                newTitle = measureAmount + ' ' + measureUnit + ' ' + name;
            } else if (measureUnit.length) {
                newTitle = measureUnit + ' ' + name;
            } else {
                newTitle = name;
            }

            if (newTitle.length) {
                anchor.find(':jqmData(recipe="title")').text(newTitle);
            }

            console.log(anchor);

        },

        enable: function() {  },

        // Destroy an instantiated plugin and clean up modifications
        // the widget has made to the DOM
        destroy: function () {
            //this.element.removeStuff();
            // For UI 1.8, destroy must be invoked from the
            // base widget
            $.Widget.prototype.destroy.call(this);
            // For UI 1.9, define _destroy instead and don't
            // worry about calling the base widget
        },

        //Respond to any changes the user makes to the option method
        _setOption: function ( key, value ) {
            switch (key) {
            case "title":
                // this is all optional
                console.log(value);
                this.element.find(this.options.targetSelector).each(function() {
                    $(this).find('a span')[0].firstChild.textContent = value;
                    // console.log(this);
                });
                // this.options.someValue = doSomethingWith( value );
                break;
            default:
                // optional
                this.options[ key ] = value;
                break;
            }

            // For UI 1.8, _setOption must be manually invoked from
            // the base widget
            $.Widget.prototype._setOption.apply(this, arguments);
            // For UI 1.9 the _super method can be used instead
            // this._super( "_setOption", key, value );
        }
    });

    //auto self-init widgets
    $( document ).on( "pagebeforecreate", function( e ) {
        $.mdunhem.recipes.prototype.enhanceWithin( e.target );
    });

})( jQuery, window, document );


 