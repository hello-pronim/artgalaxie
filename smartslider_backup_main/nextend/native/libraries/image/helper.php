<?php

class N2ImageHelper extends N2ImageHelperAbstract
{

    public static function initLightbox() {

    }

    public static function getLightboxFunction() {
        return 'function (callback) {
            var jInsertFieldValue = window.jInsertFieldValue;

            window.jInsertFieldValue = $.proxy(function (value) {
                    callback("$/" + value);
                    this.joomlaModal.hide();
                    window.jInsertFieldValue = jInsertFieldValue;
                }, this);

            this.joomlaModal = new NextendModal({
                zero: {
                    fit: true,
                    size: [
                        980,
                        680
                    ],
                    title: "' . n2_('Images') . '",
                    content: \'\',
                    fn: {
                        show: function () {
                            this.content.append(nextend.browse.getNode("single", $.proxy(function(image){
                                callback(image);
                                this.hide();
                                window.jInsertFieldValue = jInsertFieldValue;
                            }, this)));
                        }
                    }
                }
            }, true);
        }';
    }

    public static function getLightboxMultipleFunction() {
        return 'function (callback) {
            var jInsertFieldValue = window.jInsertFieldValue;

            window.jInsertFieldValue = $.proxy(function (value) {
                    callback([{
                        image: "$/" + value,
                        title: value,
                        description: ""
                    }]);
                    this.joomlaModal.hide();
                    window.jInsertFieldValue = jInsertFieldValue;
                }, this);

            this.joomlaModal = new NextendModal({
                zero: {
                    fit: true,
                    size: [
                        980,
                        680
                    ],
                    title: "' . n2_('Images') . '",
                    controlsClass: "n2-modal-controls-side",
                    controls: [\'<a href="#" class="n2-button n2-button-normal n2-button-l n2-button-green n2-h4 n2-uc">' . n2_('Select') . '</a>\'],
                    content: \'\',
                    fn: {
                        show: function () {
                            this.content.append(nextend.browse.getNode("multiple"));
                            this.controls.find(".n2-button-green")
                                .on("click", $.proxy(function (e) {
                                    e.preventDefault();
                                    var selected = nextend.browse.getSelected(),
                                        images = [];

                                        for(var i = 0; i < selected.length; i++){
                                            images[i] = {
                                                image: selected[i],
                                                title: selected[i].split("/").pop(),
                                                description: ""
                                            };
                                        }
                                    this.hide();
                                    callback(images);
                                    window.jInsertFieldValue = jInsertFieldValue;
                                }, this));
                        }
                    }
                }
            }, true);
        }';
    }
}