<?php

class N2SmartSliderFrontendHomeController extends N2Controller
{

    public function initialize() {
        parent::initialize();

        N2Loader::import(array(
            'models.Sliders',
            'models.Slides'
        ), 'smartslider');

    }

    public function actionIndex() {

    }

    public function actionJoomla($sliderid, $usage) {
    }

    public function actionWordpress($sliderid, $usage) {
    }

    public function actionMagento($sliderid, $usage) {
    }

    public function actionNative($sliderid, $usage) {
        $this->addView("native", array(
            "sliderid" => $sliderid,
            "usage"    => $usage
        ), "content");
        $this->render();
    
    }

} 