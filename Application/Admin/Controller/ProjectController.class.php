<?php
namespace Admin\Controller;
use Think\Page;
use Admin\Logic\FenxiaoLogic;
class ProjectController extends BaseController {
    //项目列表
    public function ProjectList(){
        //判断设置是否全部可见还是只客服可见
        $project=M('project');
        $ps=M('project_state');
        if(session('admin_info')['id']!=1 && C('JURISDICTION')==1){
            $where="  and (project_service='0' or project_service=".session('admin_info')['id'].')';
            $w="project_service='0' or project_service=".session('admin_info')['id'];
        }else{
            $where='1=1';
            $w='1=1';
        }
            $find=$ps->where('id=1')->find();
            $arr=explode('|',$find['name']);

            $name=I('get.pro');
            $type=I('get.typ');
            $ttype=I('get.type');

            if($name){
                $where.=" and project_name like '%$name%'";
            }
            if($type){
                $where.=" and type_id = $type";
            }
            if($ttype!=null){
                $ids='';
                $ar=$project->field('project_id,project_stime')->select();
                // dump($ar);
                foreach ($ar as $key => $value) {
                    $liu=count(explode('|',$value['project_stime']))-1;
                    $liu=$liu==null?0:$liu;
                    if ($liu==$ttype) {
                        $ids.=$value['project_id'].',';
                        
                    }
                }
                $ids=trim($ids,',');
                $ids=$ids==null?0:$ids;
                $where.=" and project_id in ($ids)";
            }
            $count=$project->where($where)->count();
            $page=new Page($count,10);
            $sel=$project->where($where)->limit($page->firstRow.','.$page->listRows)->select();
            
            $tp=M('project_type')->select();
            $tpp=array();
            foreach($tp as $key=>$value){
                $tpp[$value['type_id']]=$value;
            }
            $this->assign('name',$name);
            $this->assign('type',$type);
            $this->assign('ttype',$ttype);
            $this->assign('sel',$sel);
            $this->assign('page',$page->show());
            $this->assign('tp',$tpp); 
            $this->assign('arr',$arr);  
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
        $f=M('project_state')->where('id=1')->find();
        $find['state']=explode('|',$f['name']);
        if ($find['project_stime']) {
            $s=count(explode('|',$find['project_stime']));
            dump($s);
            $this->assign('state',$find['state'][$s-1]);
            if($s==6){
                $find['num']=2;
            }elseif($s>1 && $s<6){
                $find['num']=1;
            }else{
                $find['num']=0;
            }
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

    //选择类型后进入上一阶段返回ajax
    public function complete_ajaxUP(){
        $find=M('project')->where("project_id=".$_POST['dqq'])->find();
        $time=explode('|',$find['project_stime']);
        array_pop($time);
        $time=implode('|',$time);
        $num=$find['project_snum']-1;
        $m=M('project')->where("project_id=".$_POST['dqq'])->save(array('project_stime'=>$time,'project_snum'=>$num));
        if($m){
            $s='success';
        }else{
            $s='error';
        }
        echo '{"m":"'.$s.'"}';
    }

    //选择类型后进入下一阶段返回ajax
    public function complete_ajaxDOWN(){
        $find=M('project')->where("project_id=".$_POST['dqq'])->find();
        $time=$find['project_stime'].'|'.time();
        $time=trim($time,'|');
        $num=$find['project_snum']+1;
        $m=M('project')->where("project_id=".$_POST['dqq'])->save(array('project_stime'=>$time,'project_snum'=>$num));
        if($m){
            $s='success';
        }else{
            $s='error';
        }
        echo '{"m":"'.$s.'"}';
    }

    //派发佣金\
    public function yongjin(){
        $p=D('Project');
        $w=D('UserWallet');
        $pro=$p->paifa($_GET['id']);
        if (!$pro) {
            $this->error('无效项目');
        }
        $a=new FenxiaoLogic();
        $find=$a->fenxiao($pro['user_id']);   ///////////获取一级二级分销id

        $p->save($_GET['id'],$find['one']['user_id'],$find['two']['user_id']);      ///////////更改项目一级二级字段

        if ($find['one']['user_id']) {   
            $one=$a->fenxiao($find['one']['user_id'],$_GET['id'],1);//////////获得变动钱数
            $w->paifa($find['one']['user_id'],$one['price']);//////////////添加钱包
        }

        if ($find['two']['user_id']) {                                              ////////////二级user_id
            $two=$a->fenxiao($find['two']['user_id'],$_GET['id'],2);
            $w->paifa($find['two']['user_id'],$two['price']);
        }

        $this->success('派发成功');
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
    // public function projectList_complete_add(){
    //     if(session('admin_info')['role_id']!=0){
    //         if(jurisdiction('33')==false){
    //             $this->error('你没有权限');
    //         }            
    //     }
    //     if(!empty($_POST)){
    //         if(trim($_POST['one'])=='' || trim($_POST['two'])=='' || trim($_POST['three'])=='' || trim($_POST['four'])=='' || trim($_POST['five'])=='' || trim($_POST['six'])=='' ){
    //             $this->error('信息不能为空',U('Project/projectList_complete_add'));
    //             die; 
    //         } 
    //         $im=implode('|',$_POST);
    //         $id=M('project_state')->add(array('name'=>$im,'add_time'=>time()));
    //          admin_log('管理员添加项目状态编号为'.$id);
    //         $this->redirect('Project/projectList_complete');           
    //     }
    //     $this->display();
    // }

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
        $s=0;
        if(!empty($_POST)){
            foreach ($_FILES['upload_pic']['name'] as $value) {
                if($value==''){
                    $s++;                    
                }
            }
            if(trim($_POST['one'])=='' || trim($_POST['two'])=='' || trim($_POST['three'])=='' || trim($_POST['four'])=='' || trim($_POST['five'])=='' || trim($_POST['six'])=='' ){
                $this->error('信息不能为空',U('Project/ProjectList_complete_up?id='.$id));
                die; 
            }

            if($s==0){
                $img=array();
                if($_FILES['error']==0){
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize   =     0 ;// 设置附件上传大小
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath  =      './Uploads/Admin/'; // 设置附件上传根目录
                    $upload->savePath  =      ''; // 设置附件上传（子）目录
                    $upload->saveName  =      array('uniqid',''); // 设置多图上传
                    // 上传文件 
                    $info   =   $upload->upload(array($_FILES['upload_pic']));
                    if(!$info) {// 上传错误提示错误信息
                        $this->error($upload->getError());
                    }else{// 上传成功 获取上传文件信息
                        foreach($info as $file){

                                 $f='/Uploads/Admin/'.$file['savepath'].$file['savename'];
                                 $name=$file['savename'];

                        $img[]=M('img')->add(array('img_name'=>$name,'img_url'=>$f,'img_desc'=>'广告'));
                        }
                    }                
                }    
                $i=implode('|',$img);         
                $im=implode('|',$_POST);
                $arr=array('id'=>$id,'name'=>$im,'img_id'=>$i,'update_time'=>time());   
            }elseif($s>=1 && $s<7){
                    $this->error('如果上传图片，七张图片必须全部上传');
                    die;                
            }else{
                $im=implode('|',$_POST);
                $arr=array('id'=>$id,'name'=>$im,'update_time'=>time());
            }
            M('project_state')->save($arr);
             admin_log('管理员修改编号为'.$id.'的项目状态');
            $this->redirect('Project/projectList_complete');
        }
        if($find['name']==''){
            $fi='';
        }else{
            $fi=explode('|',$find['name']);
        }
        if($find['img_id']==''){
            $arr='';
        }else{
            $img=explode('|',$find['img_id']);
            $arr=array();
            foreach($img as $val){
                $arr[]=M('img')->where('img_id='.$val)->find();
            }
        }
        $this->assign('arr',$arr);
        $this->assign('find',$fi);
        $this->assign('id',$id);
        $this->display();
    }

    //删除项目状态
    // public function projectList_complete_del(){
    //     if(session('admin_info')['role_id']!=0){
    //         if(jurisdiction('33')==false){
    //             $this->error('你没有权限');
    //         }            
    //     }
    //     $id=I('get.id',0,'intval');
    //     if($id==''){
    //         $this->error('参数错误',U('Project/ProjectList_complete'));
    //         die;             
    //     }
    //     $find=M('project_state')->where('id='.$id)->find();
    //     if($find==''){
    //         $this->error('参数错误',U('Project/ProjectList_complete'));
    //         die;            
    //     }
    //     $pro=M('project')->where('project_state='.$id)->find();
    //     if($pro!=''){
    //         $this->error('请先处理选择该状态的项目之后再删除该状态',U('Project/ProjectList_complete'));
    //         die;            
    //     }
    //     M('project_state')->where('id='.$id)->delete();
    //      admin_log('管理员删除编号为'.$id.'的项目状态');
    //     $this->redirect('Project/projectList_complete');        
    // }

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

    //项目所在地
    public function projectList_address(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('34')==false){
                $this->error('你没有权限');
            }            
        }
        if(!empty($_POST)){
            if($_POST['add']=='add'){
                $m=M('project_address')->add(array('name'=>$_POST['apad']));
                if($m){
                    $this->success('添加成功');
                    die;
                }else{
                    $this->error('添加失败');
                    die;
                }
            }
            if($_POST['del']=='del'){
                $m=M('project_address')->delete($_POST['pad']);
                if($m){
                    $this->success('删除成功');
                    die;
                }else{
                    $this->error('删除失败');
                    die;
                }                
            }
        }
        $pad=M('project_address')->select();
        $this->assign('pad',$pad);
        $this->display();
    }








}