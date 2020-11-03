<?php

class N2SystemBackendLoginController extends N2BackendController
{

    public $layoutName = 'full';

    public function initialize() {
        parent::initialize();

        N2Loader::import(array(
            'models.login'
        ), 'system');
    }

    public function actionIndex() {
        if (N2Post::getInt('save') == 1 && $this->validateToken()) {
            $data = new N2Data(N2Post::getVar('login'));
            if (N2User::doLogIn($data->get('user_name'), $data->get('user_password'))) {
                $this->redirect(array('dashboard/index'));
            } else {
                N2Message::error('Sorry, the login details does not appear to be valid.');
            }
        }

        $this->addView("index");
        $this->render();
    }

    public function actionLogout() {
        N2User::logOut();
        $this->redirect(array('dashboard/index'));
    }
}
