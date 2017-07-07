<?php
namespace Admin\Controller;
class IndexController extends BaseController {
    public function _empty(){
        $this->redirect('index');
    }

    public function index()
    {
        // dump(time());int(1499320374)
        // dump(C('CONFIG'));

        $this->assign('find',C('CONFIG'));
        $this->display();
    }

    public function system_go(){
        $post=I('post.');

        if (!empty($_FILES['photo']['name'])) {
            $photo=$this->upload($_FILES['photo']);
            $post['store_logo']=$photo['savepath'].$photo['savename'];
        }else{
            $post['store_logo']=C('CONFIG')['store_logo'];
        }

        S('FIND',$post);

        $this->success('保存成功');
    }
}