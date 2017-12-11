<?php
/**
*
* 版权所有：恰维网络<qwadmin.qiawei.com>
* 作    者：寒川<hanchuan@qiawei.com>
* 日    期：2016-01-21
* 版    本：1.0.0
* 功能说明：前台控制器演示。
*
**/
namespace Home\Controller;
use Think\Controller;
use Vendor\Page;

class IndexController extends ComController {
    public function index(){

		$this -> display();
    }
	
	
	//发送邮件
	public function emails(){

        //邮件
        $em = new \Org\Util\Email;
		//姓名
		$name = $_POST['name'];
		
		//电话
		$phone = $_POST['phone'];
		
		//邮箱
		$email = $_POST['email'];
		
		//留言
		$message = $_POST['message'];
        $to = 1;
        $youxaingtitle = "嘉盼资产";
        $YouxiangContent = "用户姓名:&nbsp;&nbsp;".$name."<br/><br/>用户电话:&nbsp;&nbsp;".$phone."<br/><br/>用户邮箱:&nbsp;&nbsp;".$email."<br/><br/>用户留言:&nbsp;&nbsp;".$message;
        $emailtrue = $em->sentemail($to,$youxaingtitle,$YouxiangContent);
		
		$emails = M("emails"); // 实例化User对象
		$data['name'] = $name;
		$data['phone'] = $phone;
		$data['email'] = $email;
		$data['message'] = $message;
		$data['mtime'] = date("Y-m-d h:i:s");
		
		$emails->add($data);


        if($emailtrue){
            echo 1;

        }


	}
}