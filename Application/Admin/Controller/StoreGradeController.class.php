<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class StoreGradeController extends UserBaseController{
    public function index(){
        $sg_model = D('StoreGrade');        
        $count = $sg_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $sg_list = $sg_model->order('sg_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('sg_list'=> $sg_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $sg_model=D('StoreGrade');
        if(IS_POST)
        {
            if($sg_model->create())
            {
                if($sg_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($sg_model->getError(), 300);
            }
            echo $result;
        }else{
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $sg_id = I('get.uid');
        }elseif(I('post.check')){
            $sg_id = I('post.check');
        }else{
            $sg_id = 0;
        }
        if($sg_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $sg_model = D('StoreGrade');
            $count = $sg_model->delete($sg_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
    
        echo $result;
    }
    
    public function edit()
    {
        $sg_id = I('get.uid');
        $sg_model = D('StoreGrade');
        if(IS_POST)
        {
            if($sg_model->create(I('post.'),2,array('sg_id'=>$sg_id)))
            {
                if($sg_model->where(array('sg_id'=>$sg_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$sg_model->getError(), 300);
                }
            }else{
                $result = $this->message($sg_model->getError(), 300);
            }
            echo $result;
        }else{
            $sg_info = $sg_model->where(array('sg_id'=>$sg_id))->find();
            $this->assign('sg_info', $sg_info);
            $this->display();
        }
    }
}