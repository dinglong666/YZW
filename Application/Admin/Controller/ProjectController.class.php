<?php
namespace Admin\Controller;
use Think\Page;
class ProjectController extends BaseController {
    //项目列表
    public function ProjectList(){
        //判断设置是否全部可见还是只客服可见
        if(session('admin_info')['id']!=1){
            if(C('JURISDICTION')==1){
                $where="  and (project_service='0' or project_service=".session('admin_info')['id'].')';
                $w="project_service='0' or project_service=".session('admin_info')['id'];
            }elseif(C('JURISDICTION')==2){
                $where='';
                $w='';
            }else{
                $where='';
                $w='';
            }
        }else{
            $where='';
            $w='';
        }
        if(!empty($_POST['pro']) || !empty($_POST['typ'])){
            $name=I('post.pro','','trim');
            $type=I('post.typ','','trim');
            if($name=='' && $type!=0){
                $count=M('project')->where('type_id='.$type.$where)->count();
                $page=new page($count,10);
                $sel=M('project')->where('type_id='.$type.$where)->limit($page->firstRow.','.$page->listRows)->select();
            }
            if($name!='' && $type==0){
                $count=M('project')->where("project_name like '%{$name}%'".$where)->count();
                $page=new page($count,10);
                $sel=M('project')->where("project_name like '%{$name}%'".$where)->limit($page->firstRow.','.$page->listRows)->select();
            }
            if($name!='' && $type!=0){
                $count=M('project')->where("project_name like '%{$name}%' and type_id=".$type.$where)->count();
                $page=new page($count,10);
                $sel=M('project')->where("project_name like '%{$name}%' and type_id=".$type.$where)->limit($page->firstRow.','.$page->listRows)->select();
            }
        }else{
            $count=M('project')->count();     
            $page=new page($count,10);
            $sel=M('project')->where($w)->limit($page->firstRow.','.$page->listRows)->select();         
        }
            $tp=M('project_type')->select();
            $tpp=array();
            foreach($tp as $key=>$value){
                $tpp[$value['type_id']]=$value;
            }
            $this->assign('sel',$sel);
            $this->assign('page',$page->show());
            $this->assign('tp',$tpp);   
        $this->display();
    }

    //查看项目详情
    public function project_detail(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('31')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        if($id==''){
            $this->error('参数错误',U('Project/ProjectList'));
            die;              
        }
        $find=M('project')->where('project_id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('Project/ProjectList'));
            die;            
        }
        if($find['project_state']==0){
            $find['project_state']=M('project_state')->select();
            $find['pd']=0;
        }else{
            $f=M('project_state')->where('id='.$find['project_state'])->find();
            $find['state']=explode('|',$f['name']);
            if($find['project_stime']!=''){
                $s=count(explode('|',$find['project_stime']))-1;
                $this->assign('state',$find['state'][$s]);
                if($s==5){
                    $find['num']=1;
                }else{
                    $find['num']=0;
                }
            }
            $find['pd']=1;
        }
        $this->assign('find',$find);
        $this->display();
    }

    //确认选择的状态类型返回ajax
    public function complete_ajax(){
        $m=M('project')->where('project_id='.$_POST['dq'])->save(array('project_state'=>$_POST['x'],'project_stime'=>time()));
        if($m){
            $s='success';
        }else{
            $s='error';
        }
        echo '{"m":"'.$s.'"}';
    }

    //选择类型后进入下一阶段返回ajax
    public function complete_ajaxUP(){
        $find=M('project')->where("project_id=".$_POST['dqq'])->find();
        $time=$find['project_stime'].'|'.time();
        // if(count(implode($time))==6){

        // }
        $m=M('project')->where("project_id=".$_POST['dqq'])->save(array('project_stime'=>$time));
        if($m){
            $s='success';
        }else{
            $s='error';
        }
        echo '{"m":"'.$s.'"}';
    }

    //项目状态分类列表
    public function projectList_complete(){
        $sel=M('project_state')->select();
        $this->assign('sel',$sel);
        $this->display();
    }

    //项目信息保存
    public function project_information(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('31')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('post.id',0,'intval');
        $bzj=I('post.bzj',0,'trim');
        $sj=I('post.sj',0,'trim');
        if(empty($bzj) || empty($sj)){
            $this->error('信息不能为空',U('Project/project_detail?id='.$id));
            die;            
        }
        M('project')->where('project_id='.$id)->save(array('project_price'=>$bzj,'project_actual'=>$sj));
        admin_log('管理员修改编号为'.$id.'的项目信息');
        $this->redirect('Project/projectList');
    }

    //是否开启定制客服
    public function complete_customized(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('31')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $find=M('project')->where('project_id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('Project/projectList'));
            die;             
        }
        if(!empty($_POST)){
            $admin=I('post.padmin',0,'intval');
            $admin2=I('post.padmin2',0,'intval');
            if($admin===0){
                $this->error('请选择客服',U('Project/complete_customized?id='.$id));
                die;                 
            }
            if($admin2===0){
                $arr=array('user_id'=>$find['user_id'],
                    'project_id'=>$find['project_id'],
                    'information_type'=>1,
                    'information_content'=>'您的'.$find['project_name'].'项目已被指派客服，如有问题可咨询客服解决！',
                    'add_time'=>time());
                M('information')->add($arr);
                M('project')->where('project_id='.$id)->save(array('project_service'=>$admin));                
            }else{
                if($admin!=$admin2){
                    $arr=array('user_id'=>$find['user_id'],
                        'project_id'=>$find['project_id'],
                        'information_type'=>1,
                        'information_content'=>'您的'.$find['project_name'].'项目客服已变更，请留意。有问题可咨询客服解决！',
                        'add_time'=>time());
                    M('information')->add($arr);
                    M('project')->where('project_id='.$id)->save(array('project_service'=>$admin)); 
                }
            }
            $this->redirect('Project/projectList');
        }
        $sel=M('admin')->select();
        $this->assign('sel',$sel);
        $this->assign('find',$find);
        $this->display();
    }

    //添加项目状态
    public function projectList_complete_add(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('33')==false){
                $this->error('你没有权限');
            }            
        }
        if(!empty($_POST)){
            if(trim($_POST['one'])=='' || trim($_POST['two'])=='' || trim($_POST['three'])=='' || trim($_POST['four'])=='' || trim($_POST['five'])=='' || trim($_POST['six'])=='' ){
                $this->error('信息不能为空',U('Project/projectList_complete_add'));
                die; 
            } 
            $im=implode('|',$_POST);
            $id=M('project_state')->add(array('name'=>$im,'add_time'=>time()));
             admin_log('管理员添加项目状态编号为'.$id);
            $this->redirect('Project/projectList_complete');           
        }
        $this->display();
    }

    //编辑项目状态
    public function projectList_complete_up(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('33')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        if($id==''){
            $this->error('参数错误',U('Project/ProjectList_complete'));
            die;             
        }
        $find=M('project_state')->where('id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('Project/ProjectList_complete'));
            die;            
        }
        if(!empty($_POST)){
            if(trim($_POST['one'])=='' || trim($_POST['two'])=='' || trim($_POST['three'])=='' || trim($_POST['four'])=='' || trim($_POST['five'])=='' || trim($_POST['six'])=='' ){
                $this->error('信息不能为空',U('Project/ProjectList_complete_up?id='.$id));
                die; 
            }
            $im=implode('|',$_POST);
            $arr=array('id'=>$id,'name'=>$im,'update_time'=>time());
            M('project_state')->save($arr);
             admin_log('管理员修改编号为'.$id.'的项目状态');
            $this->redirect('Project/projectList_complete');
        }
        if($find['name']==''){
            $fi='';
        }else{
            $fi=explode('|',$find['name']);
        }
        $this->assign('find',$fi);
        $this->assign('id',$id);
        $this->display();
    }

    //删除项目状态
    public function projectList_complete_del(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('33')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        if($id==''){
            $this->error('参数错误',U('Project/ProjectList_complete'));
            die;             
        }
        $find=M('project_state')->where('id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('Project/ProjectList_complete'));
            die;            
        }
        $pro=M('project')->where('project_state='.$id)->find();
        if($pro!=''){
            $this->error('请先处理选择该状态的项目之后再删除该状态',U('Project/ProjectList_complete'));
            die;            
        }
        M('project_state')->where('id='.$id)->delete();
         admin_log('管理员删除编号为'.$id.'的项目状态');
        $this->redirect('Project/projectList_complete');        
    }

    //项目分类列表
    public function ProjectList_type(){
        $count=M('Project_type')->count();
        $page=new page($count,10);
        $sel=M('Project_type')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('sel',$sel);
        $this->assign('page',$page->show());
        $this->assign('xs',array('不显示','显示'));
        $this->display();
    }

    //添加项目分类
    public function ProjectList_type_add(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('32')==false){
                $this->error('你没有权限');
            }            
        }
        if(!empty($_POST)){
            $name=I('post.pname','','trim');
            $desc=I('post.pdesc','','trim');
            if($_POST['pxs']!='0' && $_POST['pxs']!='1'){
                $this->error('显示参数错误',U('Project/ProjectList_type_add'));
                die;                
            }
            if($name==''){
                $this->error('分类名称不能为空',U('Project/ProjectList_type_add'));
                die;
            }
            $p=M('project_type')->add(array('type_name'=>$name,'type_desc'=>$desc,'type_state'=>$_POST['pxs']));
            admin_log('管理员添加项目分类编号为'.$p);
            $this->redirect('Project/projectList_type');
            die;
        }
        $this->display();
    }

    //项目分类状态改变
    public function ProjectList_type_state(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('32')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('project_type')->where('type_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertList'));
            die;              
        }
        if($ad['type_state']==1){
            $a=0;
        }else{
            $a=1;
        }
        M('project_type')->where('type_id='.$id)->save(array('type_state'=>$a));
        $this->redirect('Project/projectList_type');
    }

    //删除项目分类
    public function ProjectList_type_del(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('32')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('project_type')->where('type_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertList'));
            die;              
        }
        $pro=M('project')->where('type_id='.$id)->find();
        if($pro!=''){
            $this->error('请先处理项目中已有该分类的项目,然后再删除该分类',U('Project/projectList_type'));
            die;              
        }
        M('project_type')->where('type_id='.$id)->delete();
         admin_log('管理员删除编号为'.$id.'的项目分类');
        $this->redirect('Project/projectList_type');      
    }

    //编辑项目分类
    public function projectList_type_up(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('32')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'intval');
        $ad=M('project_type')->where('type_id='.$id)->find();
        if($ad==''){
            $this->error('参数错误',U('advert/advertList'));
            die;              
        }
        if(!empty($_POST)){
            $name=I('post.pname','','trim');
            $desc=I('post.pdesc','','trim');
            if($_POST['pxs']!='0' && $_POST['pxs']!='1'){
                $this->error('显示参数错误',U('Project/ProjectList_type_up?id='.$id));
                die;                
            }
            if($name==''){
                $this->error('分类名称不能为空',U('Project/ProjectList_type_up?id='.$id));
                die;
            }
            $p=M('project_type')->save(array('type_id'=>$id,'type_name'=>$name,'type_desc'=>$desc,'type_state'=>$_POST['pxs']));
            admin_log('管理员修改项目分类编号为'.$id);
            $this->redirect('Project/projectList_type');
            die;
        }
        $find=M('project_type')->where('type_id='.$id)->find();
        $this->assign('find',$find);
        $this->display();        
    }










}