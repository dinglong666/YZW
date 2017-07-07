<?php
namespace Admin\Controller;
use Think\Page;
class AdvertController extends BaseController {
    //广告列表
    public function advertList(){
        if(!empty($_POST['ad']) || !empty($_POST['po'])){
            $ad=empty($_POST['ad'])?'':trim($_POST['ad']);
            $po=empty($_POST['po'])?0:$_POST['po'];
            if($ad=='' && $po!=''){
                $count=M('ad')->where('pid='.$po)->order('orderby desc')->count();
                $page=new page($count,4);
                $sel=M('ad')->where('pid='.$po)->order('orderby desc')->limit($page->firstRow.','.$page->listRows)->select();                
            }
            if($po=='' && $ad!=''){
                $count=M('ad')->where('ad_name like "%'.$ad.'%"')->order('orderby desc')->count();
                $page=new page($count,4);
                $sel=M('ad')->where('ad_name like "%'.$ad.'%"')->order('orderby desc')->limit($page->firstRow.','.$page->listRows)->select();                
            }
            if($ad!='' && $po!=''){
                $count=M('ad')->where('ad_name like "%'.$ad.'%" and pid='.$po)->order('orderby desc')->count();
                $page=new page($count,4);
                $sel=M('ad')->where('ad_name like "%'.$ad.'%" and pid='.$po)->order('orderby desc')->limit($page->firstRow.','.$page->listRows)->select();                 
            }
        }else{
            $count=M('ad')->order('orderby desc')->count();
            $page=new page($count,4);
        	$sel=M('ad')->order('orderby desc')->limit($page->firstRow.','.$page->listRows)->select();
        }
            $ad=M('ad_position')->select();
            $this->assign('ad',$ad);
            $this->assign('sel',$sel);
            $this->assign('xs',array('不显示','显示'));
            $this->assign('page',$page->show());
    	$this->display();
    }

    //改变广告显示状态
    public function advertList_state(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('21')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('ad')->where('ad_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertList'));
            die;              
        }
        if($ad['enabled']==0){
            $a=1;
        }else{
            $a=0;
        }
        M('ad')->where('ad_id='.$id)->save(array('enabled'=>$a));
        $this->redirect('Advert/advertList');        
    }

    //删除广告
    public function advertList_del(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('21')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('ad')->where('ad_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertList'));
            die;              
        }
        M('ad')->where('ad_id='.$id)->delete();
        admin_log('管理员删除编号为'.$id.'的广告');
        $this->redirect('Advert/advertList');        
    }

    //编辑广告
    public function advertList_up(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('21')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('ad')->where('ad_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertList'));
            die;              
        }
        if(!empty($_POST)){
            if(trim($_POST['aname'])=='' || trim($_POST['aks'])=='' || trim($_POST['ajs'])=='' ){
                $this->error('信息不能为空',U('advert/advertList_add?id='.$_GET['id']));
                die;                
            }
            if($_POST['xs']!=0 && $_POST['xs']!=1){
                $this->error('是否显示参数错误',U('advert/advertList_add?id='.$_GET['id']));
                die;                
            }
            if($_FILES['aimg']['error']==0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     0 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =      './Uploads/Admin/'; // 设置附件上传根目录
                $upload->savePath  =      ''; // 设置附件上传（子）目录
                // 上传文件 
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    foreach($info as $file){
                         $f='/Uploads/Admin/'.$file['savepath'].$file['savename'];
                         $name=$file['savename'];
                    }
                }
                $img=M('img')->add(array('img_name'=>$name,'img_url'=>$f,'img_desc'=>'广告'));
                $arr=array(
                    'ad_id'=>$_GET['id'],
                    'pid'=>trim($_POST['aposition']),
                    'ad_name'=>trim($_POST['aname']),
                    'ad_link'=>trim($_POST['aurl']),
                    'img_id'=>$img,
                    'start_time'=>strtotime($_POST['aks']),
                    'end_time'=>strtotime($_POST['ajs']),
                    'enabled'=>$_POST['xs'],
                    'orderby'=>$_POST['asort']
                    );                
            }elseif($_FILES['aimg']['error']==4){
                $arr=array(
                    'ad_id'=>$_GET['id'],
                    'pid'=>trim($_POST['aposition']),
                    'ad_name'=>trim($_POST['aname']),
                    'ad_link'=>trim($_POST['aurl']),
                    'start_time'=>strtotime($_POST['aks']),
                    'end_time'=>strtotime($_POST['ajs']),
                    'enabled'=>$_POST['xs'],
                    'orderby'=>$_POST['asort']
                    );                  
            }
            M('ad')->save($arr);
            admin_log('管理员修改编号为'.$_GET['id'].'的广告');
            $this->redirect('Advert/advertList');
            die;            
        }

        $this->assign('ad',$ad);
        $this->assign('id',$_GET['id']);
        $this->display();
    }

    //添加广告
    public function advertList_add(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('21')==false){
                $this->error('你没有权限');
            }            
        }
    	if(!empty($_POST)){
            if(trim($_POST['aname'])=='' || trim($_POST['aks'])=='' || trim($_POST['ajs'])=='' ){
                $this->error('信息不能为空',U('advert/advertList_add'));
                die;                
            }
            if($_POST['xs']!=0 && $_POST['xs']!=1){
                $this->error('是否显示参数错误',U('advert/advertList_add'));
                die;                
            }
            if($_FILES['error']==0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     0 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =      './Uploads/Admin/'; // 设置附件上传根目录
                $upload->savePath  =      ''; // 设置附件上传（子）目录
                // 上传文件 
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    foreach($info as $file){
                         $f='/Uploads/Admin/'.$file['savepath'].$file['savename'];
                         $name=$file['savename'];
                    }
                }                
            }
            $img=M('img')->add(array('img_name'=>$name,'img_url'=>$f,'img_desc'=>'广告'));
            $arr=array('pid'=>trim($_POST['aposition']),
                'ad_name'=>trim($_POST['aname']),
                'ad_link'=>trim($_POST['aurl']),
                'img_id'=>$img,
                'start_time'=>strtotime($_POST['aks']),
                'end_time'=>strtotime($_POST['ajs']),
                'enabled'=>$_POST['xs'],
                'orderby'=>$_POST['asort']
                );
            $a=M('ad')->add($arr);
            admin_log('管理员添加广告编号为'.$a);
            $this->redirect('Advert/advertList');
            die;
        }
        $this->display();
    }

    //广告位置
    public function advertPosition(){
        $count=M('ad_position')->count();
        $page=new page($count,8);
        $ad=M('ad_position')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('ad',$ad);
        $this->assign('page',$page->show());
        $this->assign('xs',array('不显示','显示'));
        $this->display();
    }

    //添加广告位
    public function advertPosition_add(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('22')==false){
                $this->error('你没有权限');
            }            
        }
        if(!empty($_POST)){
            if(trim($_POST['aname'])=='' || trim($_POST['awidth'])=='' || trim($_POST['aheight'])==null){
                $this->error('信息不能为空',U('advert/advertPosition_add'));
                die;
            }
            if(!is_numeric(trim($_POST['awidth']))  || !is_numeric(trim($_POST['aheight'])) ){
                $this->error('请填写正确的宽度和高度',U('advert/advertPosition_add'));
                die;
            }
            if($_POST['axs']!=0 && $_POST['axs']!=1){
                $this->error('是否显示参数错误',U('advert/advertPosition_add'));
                die;                
            }
            $arr=array('position_name'=>$_POST['aname'],'ad_width'=>$_POST['awidth'],'ad_height'=>$_POST['aheight'],'position_desc'=>$_POST['adesc'],'is_open'=>$_POST['axs']);
            $a=M('ad_position')->add($arr);
            admin_log('管理员添加广告位编号为'.$a);
            $this->redirect('Advert/advertPosition');
        }
        $this->display();
    }


                            // <li><a href="index.html"><i class="fa fa-laptop"></i><span class="text"> Dashboard</span></a></li>
                            // <li>
                            //     <a href="#"><i class="fa fa-file-text"></i><span class="text"> Pages</span> <span class="fa fa-angle-down pull-right"></span></a>
                            //     <ul class="nav sub">
                            //         <li><a href="page-activity.html"><i class="fa fa-car"></i><span class="text"> Activity</span></a></li>
                            //         <li><a href="page-inbox.html"><i class="fa fa-envelope"></i><span class="text"> Mail</span></a></li>
                            //         <li><a href="page-invoice.html"><i class="fa fa-credit-card"></i><span class="text"> Invoice</span></a></li>
                            //         <li><a href="page-profile.html"><i class="fa fa-heart-o"></i><span class="text"> Profile</span></a></li>
                            //         <li><a href="page-pricing-tables.html"><i class="fa fa-columns"></i><span class="text"> Pricing Tables</span></a></li>
                            //         <li><a href="page-404.html"><i class="fa fa-puzzle-piece"></i><span class="text"> 404</span></a></li>
                            //         <li><a href="page-500.html"><i class="fa fa-puzzle-piece"></i><span class="text"> 500</span></a></li>
                            //         <li><a href="page-lockscreen.html"><i class="fa fa-lock"></i><span class="text"> LockScreen1</span></a></li>
                            //         <li><a href="page-lockscreen2.html"><i class="fa fa-lock"></i><span class="text"> LockScreen2</span></a></li>
                            //         <li><a href="page-login.html"><i class="fa fa-key"></i><span class="text"> Login Page</span></a></li>
                            //         <li><a href="page-register.html"><i class="fa fa-sign-in"></i><span class="text"> Register Page</span></a></li>
                            //     </ul>   
                            // </li>

                            // <li><a href="{:U('BBS/index')}"><i class="fa fa-table"></i><span class="text">首页图片</span></a></li>











    //广告位页面改变显示状态
    public function advertPosition_state(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('22')==false){
                $this->error('你没有权限');
            }            
        }
        $ad=M('ad_position')->where('position_id='.$_GET['id'])->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertPosition'));
            die;              
        }
        if($ad['is_open']==0){
            $a=1;
        }else{
            $a=0;
        }
        M('ad_position')->where('position_id='.$_GET['id'])->save(array('is_open'=>$a));
        $this->redirect('Advert/advertPosition');
    }

    //广告位删除
    public function advertPosition_del(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('22')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('ad_position')->where('position_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertPosition'));
            die;              
        }
        $a=M('ad')->where('pid='.$_GET['id'])->find();
        if($a!=''){
            $this->error('请删除广告中有该位置的广告后，再删除该广告位',U('advert/advertPosition'));
            die;             
        }
        M('ad_position')->where('position_id='.$_GET['id'])->delete();
        admin_log('管理员删除编号为'.$_GET['id'].'的广告位');
        $this->redirect('Advert/advertPosition');
    }

    //广告位编辑
    public function advertPosition_up(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('22')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('ad_position')->where('position_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertPosition'));
            die;              
        }        
        if(!empty($_POST)){
            if(trim($_POST['aname'])=='' || trim($_POST['awidth'])=='' || trim($_POST['aheight'])==null){
                $this->error('信息不能为空',U('advert/advertPosition_up?id='.$_GET['id']));
                die;
            }
            if(!is_numeric(trim($_POST['awidth']))  || !is_numeric(trim($_POST['aheight'])) ){
                $this->error('请填写正确的宽度和高度',U('advert/advertPosition_up?id='.$_GET['id']));
                die;
            }
            if($_POST['axs']!=0 && $_POST['axs']!=1){
                $this->error('是否显示参数错误',U('advert/advertPosition_up?id='.$_GET['id']));
                die;                
            }
            $arr=array('position_id'=>$_GET['id'],'position_name'=>$_POST['aname'],'ad_width'=>$_POST['awidth'],'ad_height'=>$_POST['aheight'],'position_desc'=>$_POST['adesc'],'is_open'=>$_POST['axs']);
            M('ad_position')->save($arr);
            admin_log('管理员修改编号为'.$_GET['id'].'的广告位');
            $this->redirect('Advert/advertPosition');
        }
        M('ad_position')->where('position_id='.$_GET['id'])->find();
        $this->assign('ad',$ad);
        $this->display();
    }

}