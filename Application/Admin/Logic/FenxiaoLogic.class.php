<?php 
namespace Admin\Logic;

/**
 * 
 * Class adLogic
 * @package Home\Logic
 */
class FenxiaoLogic
{

  /**
    $user_id////////用户id
    $project_id/////项目
    $distribution///分销等级
    */
    public function fenxiao($user_id,$project_id,$distribution){
        $find=D('Users')->fenxiao($user_id);

        if (!empty($project_id) && !empty($distribution)) {
            $arr=D('project')->price($project_id);
            switch ($distribution) {
                case '1':
                    $price=$arr['project_actual']*C('PROFIT1')*0.01;///////////一级利润
                    break;
                case '2':
                    $price=$arr['project_actual']*C('PROFIT2')*0.01;///////////二级利润
                    break;
                default:
                    $this->error('最多二级分销');
                break;
            }
        }
        return array(
            'one'  =>$find['yiji'],
            'two'  =>$find['erji'],
            'price' =>$price,
            );
    }



    /*
    $user_id////////用户id
    $project_id/////项目
    $distribution///分销等级
    public function fenxiao($user_id=1,$project_id=3,$distribution=1){
        $user=M('users');
        $pro=M('project');
        $find=$user->where('user_id='.$user_id)->find();
        $find['erji']=$user->where('user_id='.$find['distribution_user_id'])->find();//////////////////二级user
        $find['yiji']=$user->where('user_id='.$find['erji']['distribution_user_id'])->find();//////////一级user

        $arr=$pro->where('project_id='.$project_id)->find();
        switch ($distribution) {
            case '1':
                $price=$arr['project_actual']*C('PROFIT1')*0.01;///////////一级利润
                break;
            case '2':
                $price=$arr['project_actual']*C('PROFIT2')*0.01;///////////二级利润
                break;
            default:
                $this->error('最多二级分销');
            break;
        }
        return array(
            'yiji'  =>$find['yiji'],
            'erji'  =>$find['erji'],
            'price' =>$price,
            );
    }
    */
}