<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');

    }
    public function index()
    {
        $this->view();
    }
    public function view($page = "index")
    {
        $data['title'] = ucfirst($page);
        $check = $this->session->userdata('user');
        if(!empty($check)){
            $data['user'] = $check[0];
            $data['msg'] = $this->session->userdata('msg');
            $this->session->unset_userdata('msg');
            $data['total_employer'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `employer` WHERE `user_id` = {$check[0]['id']}");
            $data['total_seeker'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `seeker` WHERE `user_id` = {$check[0]['id']}");
            $data['total_project'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `project` WHERE `user_id` = {$check[0]['id']}");
            $date = date('Y-m-d');
            $data['total_invoice'] = $this->data->myquery("SELECT SUM(`i_grant`) as `total` FROM `invoice` WHERE  `i_end` > '$date' AND `user_id` = {$check[0]['id']}");
            $data['industry'] = $this->data->fetch('industry');
            $data['contacts'] = $this->data->fetch('contacts',array('user_id'=>$check[0]['id']));
            $data['employer'] = $this->data->fetch('employer',array('user_id'=>$check[0]['id']));
            $data['project'] =  $this->data->fetch('project',array('user_id'=>$check[0]['id']));
            $data['training'] = $this->data->fetch('training');
            $data['reminder'] = $this->data->fetch('event',array('user_id'=>$check[0]['id']));
            $data['invoice'] =  $this->data->fetch('invoice',array('user_id'=>$check[0]['id']));
            $data['campaign'] = $this->data->fetch('campaign',array('user_id'=>$check[0]['id']));
            $data['template'] = $this->data->fetch('template',array('user_id'=>$check[0]['id']));
            $data['todo'] = $this->data->fetch('todo',array('user_id'=>$check[0]['id']));

            $data['supplier'] = $this->data->fetch('supplier', array('s_child_id' => '0'));
            $id = $this->uri->segment(4);
            $data['supp_data'] = $this->data->fetch('supplier', array('id' => $id));
            $data['supp_dataa'] = $this->data->fetch('supplier', array('s_child_id' => $id));
            $data['single_invoice'] =  $this->data->fetch('invoice',array('id' => $id));

            $data['single_campaign'] = $this->data->fetch('campaign',array('p_id' => $id));
            $data['single_template'] = $this->data->fetch('template',array('id' => $id));
            $data['project_data'] = $this->data->fetch('project', array('id' => $id));
            $data['seeker_data'] = $this->data->fetch('seeker', array('project_id' => $id));
            $data['seeker_dataa'] = $this->data->fetch('seeker', array('id' => $id));
            $data['interview'] = $this->data->fetch('interview_template', array('seeker_id' => $id));
            $data['info_seeker'] = $this->data->fetch('seeker_info', array('seeker_id' => $id));
            $data['project'] = $this->data->fetch('project');
            foreach ($data['project'] as $k => $v) {
                $x = $this->data->myquery("SELECT COUNT(`id`) as `total_applicanttttt` FROM `seeker` WHERE `s_state` = '{$v['state']}'
                                      AND `s_industry` = '{$v['industry']}'");
                $data['project'][$k]['seeker'] = (!empty($x) ? $x : array());
            }
            $data['seeker'] = $this->data->fetch('seeker');
            $data['attender'] = $this->data->myquery(
                "SELECT `attender`.`name` as `name`,`attender`.`email` as `email`,`attender`.`phone` as `phone`
                    ,`attender`.`attend_status` as `status`,`attender`.`id` as `id`,`training`.`t_title` as `t_tile`,
                    `attender`.`training_id` as `training_id`
                    FROM `attender` INNER JOIN 
                    `training` ON `attender`.`training_id` = `training`.`id`
            
            ");

            $data['msgg'] = $this->data->fetch('user');
            foreach ($data['msgg'] as $k => $v)
            {
                $x = $this->data->myquery("SELECT DISTINCT(`from`),(`message`),(`date`) FROM `chat` WHERE `to` = '{$check[0]['id']}' AND `from` = '{$v['id']}' AND `notification` = 'unread' ORDER BY `date` DESC ");
               $xx = $this->data->myquery("SELECT count(`id`) as `total` FROM `chat` WHERE `to` = '{$check[0]['id']}' AND `from` = '{$v['id']}' AND `notification` = 'unread'");
                $data['msgg'][$k]['msg'] = (!empty($x)) ? $x : array();
                $data['msgg'][$k]['totall'] = (!empty($xx)) ? $xx : array();
            }

            $data['cour_training'] = $this->data->fetch('training_course');
            $this->load->view('home/header', $data);
            $this->load->view('home/' . $page);
            $this->load->view('home/footer');
        }else{
            $this->login();
        }
    }

    public function seeker_form()
    {
        $data['jobs'] = $this->data->fetch('employer');
        $data['industry'] = $this->data->fetch('industry');
        $data['msg'] = $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
        $this->load->view('form',$data);
    }
    public function upload($file)
    {
        $config['upload_path'] = 'csv_files/';
        $config['allowed_types'] = '*';
        // $config['allowed_types'] = '"video/x-msvideo|image/jpeg|video/mpeg|video/x-ms-wmv"';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data = array();
        if (!$this->upload->do_upload($file)) {
            $data = array('error' => $this->upload->display_errors());
//            $this->load->view('image',$error);
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        return $data;
    }
    public function EditPassword()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            if ($x['password'] == $check[0]['password']) {
                if ($x['password1'] == $x['password2']) {
                    $this->data->update(array('id' => $check[0]['id']),'user',array('password' => $x['password1']));
                    $this->session->set_userdata("user", $check);
                    $this->session->set_userdata('msg', "Update");
                } else {
                    $this->session->set_userdata('msg', "Password Mis Match");
                }
            } else {
                $this->session->set_userdata('msg', "Current Password  don't match");
            }
            $this->session->set_userdata("user", $check);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    public function jobRequest()
    {
        $x = $this->input->post();
       $data = $this->upload('file');
        if(isset($data['upload_data']['file_name'])){
            $x['s_cv'] = $data['upload_data']['file_name'];
        }
        $x['s_status'] = "New_Applicant";
        $this->data->insert('seeker',$x);
        $this->session->set_flashdata('msg', "Our Team Will Notify You Shortly");
        redirect($_SERVER['HTTP_REFERER']);;
    }
    public function login()
    {
        $data['msg'] = $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
        $this->session->unset_userdata('user');
        $this->load->view('home/login', $data);
    }
    public function do_login()
    {
        $data = $this->input->post();
        $data['status'] = 'Active';
        $check = $this->data->fetch('user', $data);
        if (!empty($check)) {
            $this->session->set_userdata('user', $check);
        } else {
            $this->session->set_userdata('msg', "Wrong Credential");
        }
        redirect('home/');
    }
    public function Logout()
    {
        $this->session->unset_userdata('user');
        redirect('home/login');
    }

    public function CreateEmployer()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->security->xss_clean($data);
            $x['user_id'] = $check[0]['id'];
            $x['e_status'] = "new";
            $this->data->insert('employer', $x);
            $this->session->set_userdata('msg', "Employer Information Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteEmployer($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {

            $this->data->delete(array('id' => $id), 'employer');
            $this->session->set_userdata('msg', "Employer Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function CreateProject()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['status'] = "new";
            $x['user_id'] = $check[0]['id'];
            $data = $this->data->fetch('employer', array('id' => $x['c_id']));
            $x['com_name'] = $data[0]['c_name'];
            $this->data->insert('project', $x);
            $this->session->set_userdata('msg', "Project Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function AddSeeker()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->upload('file');
            if (isset($data['upload_data']['file_name'])) {
                $x['s_cv'] = $data['upload_data']['file_name'];
            }
            $x['s_status'] = "New_Applicant";
            $this->data->insert('seeker', $x);
            $this->session->set_userdata('msg', "Job Seeker Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function CreateIndusry()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $do_check = $this->data->fetch('industry',array('industry'=>$x['industry']));
            if(empty($do_check)){
                $this->data->insert('industry', $x);
                $this->session->set_userdata('msg', "Industry Added");
            }else{
                $this->session->set_userdata('msg', "Already Added");

            }
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteIndustry($id)
    {
        $check = $this->session->userdata('user');
        if(!empty($check))
        {
            $this->data->delete(array('id'=>$id),'industry');
            $this->session->set_userdata('msg', "Delete");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function industry_modal()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx = $this->data->fetch('industry', array('id' => $x['id']));
            $data = $xx[0];
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('home/industry_edit') ?>/<?= $data['id'] ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Industry</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="industry" value="<?= $data['industry'] ?>"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function industry_edit($id)
    {
        $check = $this->session->userdata('user');
        if(!empty($check))
        {
            $x = $this->input->post();
            $this->data->update(array('id'=>$id),'industry',$x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }
    public function training($call = null)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            if ($call == 'CreateTraining') {
                $data = $this->input->post();
                $x = $this->security->xss_clean($data);
                $x['t_date'] = date('Y-m-d');
                $x['user_id'] = $check[0]['id'];
                $this->data->insert('training', $x);
                $this->session->set_userdata('msg', "Training Information Added");
                redirect($_SERVER['HTTP_REFERER']);;
            } elseif ($call == 'DeleteTraining') {
                    $id = $this->uri->segment(4);
                    $this->data->delete(array('id' => $id),'training');
                    $this->session->set_userdata('msg', "Employer Deleted");
                    redirect($_SERVER['HTTP_REFERER']);;

            } elseif ($call == 'AddCourse') {
                $data = $this->input->post();
                $x = $this->security->xss_clean($data);
                $this->data->insert('training_course', $x);
                $this->session->set_userdata('msg', "Course Information Added");
                redirect($_SERVER['HTTP_REFERER']);;
            }elseif($call == 'training_edit')
            {
                $data = $this->input->post();
                $id = $this->uri->segment(4);
                $this->data->update(array('id'=>$id),'training',$data);
                $this->session->set_userdata('msg', "Training Edit");
                redirect($_SERVER['HTTP_REFERER']);;

            }

        }
    }

    public function DeleteCourse($id)
    {
        $check = $this->session->userdata('user');
        if(!empty($check))
        {
            $this->data->delete(array('id'=>$id),'training_course');
            $this->session->set_userdata('msg', "Courses Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function CreateTraining()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx['t_title'] = $x['t_title'];
            $xx['t_attending'] = $x['t_attending'];
            $xx['t_objective'] = $x['t_objective'];
            $xx['t_type'] = $x['t_type'];
            $xx['t_instructor'] = $x['t_instructor'];
            $xx['t_location'] = $x['t_location'];
            $xx['t_outcome'] = $x['t_outcome'];
            $xx['t_duration'] = $x['t_duration'];
            $xx['t_status'] = "New";
            $this->data->insert('training', $xx);
            $new = $this->data->fetch('training', $xx);
            $data['training_id'] = $new[(count($new) - 1)]['id'];
            $data['course_name'] = $x['course_name'];
            $data['course_type'] = $x['course_type'];
            $data['course_training'] = $x['course_training'];
            $data['course_duration'] = $x['course_duration'];
            $this->data->insert('training_course', $data);
            $this->session->set_userdata('msg', "Training Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function training_modal()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx = $this->data->fetch('training',array('id' => $x['id']));
            $data = $xx[0];
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('home/training/training_edit') ?>/<?= $data['id'] ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Training information</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="t_title" value="<?= $data['t_title'] ?>"
                                        class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Attending</label>
                                        <input type="text" name="t_attending" value="<?= $data['t_attending'] ?>"
                                        class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Objective</label>
                                        <input type="text" name="t_objective" value="<?= $data['t_objective'] ?>"
                                        class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                            <select name="t_type" class="form-control">
                                                <option value="skill development"
                                                    <?= ($data['t_status'] == 'Pending') ? "selected" : "" ?>>
                                                    Skill development
                                                </option>
                                                <option value="IT"
                                                    <?= ($data['t_status'] == 'Pending') ? "selected" : "" ?>>
                                                    IT
                                                </option>
                                                <option value="session"
                                                    <?= ($data['t_status'] == 'Pending') ? "selected" : "" ?>>
                                                    Session
                                                </option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Instructor</label>
                                        <input type="text" name="t_instructor" value="<?= $data['t_instructor'] ?>"
                                        class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="t_location" value="<?= $data['t_location'] ?>"
                                        class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>OutCome</label>
                                        <input type="text" name="t_outcome" value="<?= $data['t_outcome'] ?>"
                                        class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="t_status">
                                            <option value="pending"
                                                <?= ($data['t_status'] == 'Pending') ? "selected" : "" ?>>
                                                Pending
                                            </option>
                                            <option value="canceled"
                                                <?= ($data['t_status'] == 'Pending') ? "selected" : "" ?>>
                                                Canceled
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function AddInvoice()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['i_grant'] = 0;
            $x['i_desc'] = json_encode($x['i_desc']);
            $desc = json_decode($x['i_desc'], true);
            for ($i = 0; $i < count($desc['desc']); $i++) {
                $x['i_grant'] += $desc['amount'][$i];
            }
            $x['status'] = "Pending";
            $x['user_id'] = $check[0]['id'];
            $x['payment_status'] = "UnPaid";
            $this->data->insert('invoice', $x);
            $this->session->set_userdata('msg', "Added Invoice");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteInvoice($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'invoice');
            $this->session->set_userdata('msg', "Invoice Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function campaign($call = null)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            if ($call == 'CreateCampaign') {
                $data = $this->input->post();
                $x = $this->security->xss_clean($data);
                $x['user_id'] = $check[0]['id'];
                $this->data->insert('campaign', $x);
                $this->session->set_userdata('msg', "Campaign Added");
                redirect($_SERVER['HTTP_REFERER']);;
            } elseif ($call == 'ChildCampaign') {
                $data = $this->input->post();
                $id = $this->uri->segment(4);
                $x = $this->security->xss_clean($data);
                $x['p_id'] = $id;
                $x['user_id'] = $check[0]['id'];
                $this->data->insert('campaign', $x);
                $this->session->set_userdata('msg', "Added");
                redirect($_SERVER['HTTP_REFERER']);

            } elseif ($call == 'DeleteCampaign') {
                $id = $this->uri->segment(4);
                $this->data->delete(array('id' => $id), 'campaign');
                $this->data->delete(array('p_id' => $id), 'campaign');
                $this->session->set_userdata('msg', "Campaign Deleted");
                redirect($_SERVER['HTTP_REFERER']);;
            }
        }
    }

    public function Template($call = null)
    {
        $check = $this->session->userdata('user');
        if(!empty($check))
        {
            $x = $this->input->post();
            if($call == 'AddTemplate')
            {
                $x['status'] = "Active";
                $x['user_id'] = $check[0]['id'];
                $this->data->insert('template',$x);
                $this->session->set_userdata('msg',"Template Added");
            }elseif($call == 'UpdateTemplate'){
                $id = $this->uri->segment(4);
                $this->data->update(array('id'=>$id),'template',$x);
                $this->session->set_userdata('msg',"Updated");
            }elseif($call == 'DeleteTemplate')
            {
                $id = $this->uri->segment(4);
                $this->data->delete(array('id'=>$id),'template');
                $this->session->set_userdata('msg',"Deleted");

            }
            redirect($_SERVER['HTTP_REFERER']);;
        }

    }

    public function CreateSupplier()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->security->xss_clean($data);
            $this->data->insert('supplier', $x);
            $this->session->set_userdata('msg', "Supplier Information Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }
    public function DeleteSupplier($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'supplier');
            $this->session->set_userdata('msg', "Supplier Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function ChildSupplier($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->security->xss_clean($data);
            $x['s_child_id'] = $id;
            $this->data->insert('supplier', $x);
            $this->session->set_userdata('msg', "Added");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function EditSupplier($id)
    {
        $check = $this->session->userdata('user');
        if(!empty($check))
        {
            $x = $this->input->post();

            $this->data->update(array('id'=>$id),'supplier',$x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function MoveModal()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $com = $this->data->fetch('project', array('state' => $x['state'], 'industry' => $x['industry']));
            ?>
            <div class="modal fade" id="addevent" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Move To </h4>
                        </div>
                        <?= form_open('home/MoveToProject') ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Project Title</label>
                                <input type="hidden" value="<?= $x['id'] ?>" name="seeker_id">
                                <div class="form-line">
                                    <select required="required" name="project_id" class="form-control">
                                        <option hidden selected>Select Project Title</option>
                                        <?php foreach ($com as $v) { ?>
                                            <option value="<?= $v['id'] ?>"><?= $v['pro_name'] ?>(<?= $v['com_name'] ?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-simple" data-dismiss="modal">CLOSE</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function MoveToProject()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $project = $this->data->fetch('project', array('id' => $x['project_id']));
            $company_id = $project[0]['c_id'];
            $xx = array('employer_id' => $company_id, 'project_id' => $x['project_id'], 's_status' => 'Qualified',
                'verification_status' => 'Step1');
            $this->data->update(array('id' => $x['seeker_id']), 'seeker', $xx);
            if (isset($project[0]['confirm_applicant'])) {
                $data['confirm_applicant'] = $project[0]['confirm_applicant'] + 1;
            } else {
                $data['confirm_applicant'] = 1;
            }
            $seekers = $project[0]['seeker_id'];
            $test = (!empty($seekers) AND $seekers != null) ? json_decode($seekers, true) : array();
            $test[] = $x['seeker_id'];
            $seekers = json_encode($test);
            //  var_dump($seekers);
            $push = array('seeker_id' => $seekers, 'confirm_applicant' => $data['confirm_applicant']);
            $this->data->update(array('id' => $x['project_id']), 'project', $push);
            $this->session->set_userdata('msg', "Moved");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function AddInfo($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx['seeker_id'] = $id;
            $xx['info_rating'] = $x['info_rating'];
            $xx['info_note'] = $x['info_note'];
            $this->data->insert('seeker_info',$xx);
            redirect($_SERVER['HTTP_REFERER']);;
        }

    }

    public function InfoChange($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['seeker_id'] = $id;
            $this->data->update(array('seeker_id'),'seeker_info',$x);
            redirect($_SERVER['HTTP_REFERER']);;
        }

    }
    public function UpdatePol($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx['police_check'] = (!empty($x['police_check'])) == 'on' ? "1" : 0;
            $xx['police_char'] = (!empty($x['police_char'])) == 'on' ? "1" : 0;
            $xx['police_note'] = $x['police_note'];
            $this->data->update(array('seeker_id' => $id), 'seeker_info', $xx);
            redirect($_SERVER['HTTP_REFERER']);;

        }
    }

    public function New_template($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $data = $this->data->fetch('seeker', array('id' => $id));
            $x = $this->input->post();
            $x['project_id'] = $data[0]['project_id'];
            $x['seeker_id'] = $id;
            $x['status'] = "Active";
            $this->data->insert('interview_template', $x);
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }


    public function ModalInterview()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->data->fetch('interview_template', array('id' => $x['id']));
            ?>
            <div class="modal" id="hello" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Interview</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" readonly value="<?= $data[0]['title'] ?>"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Question Description</label>
                                    <textarea class="form-control" name="ques"><?= $data[0]['ques'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Description Answer</label>
                                    <textarea class="form-control" name="ans"><?= $data[0]['ans'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function changeStatus()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $x['id']), 'seeker', array('verification_status' => $x['status']));
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }


    /////Paypall Integration
    public function payment($id){

        $data = $this->data->fetch('invoice',array('id'=>$id));
        $invoice = $data[0];
        $this->session->set_userdata('data',$invoice);
        $params = array(
            'amount' => $invoice['i_grant'],
            'currency' => 'USD',
            'return_url' => site_url('home/success'), //the link on which user will redirect after successfully making the payment
            'cancel_url' => site_url('home/cancel'),//the link on which user will redirect if payment got unsuccessful
            'LOGOIMG' => 'https://git-scm.com/images/logos/downloads/Git-Logo-Black.png'
        );
        $this->load->library('merchant');
        $this->merchant->load('paypal_express');
        $settings = array(
            'username' => 'sandbo_1215254764_biz_api1.angelleye.com',
            'password' => '1215254774',
            'signature' => 'AiKZhEEPLJjSIccz.2M.tbyW5YFwAb6E3l6my.pY9br1z2qxKx96W18v',
            'test_mode' => true
        );
        $this->merchant->initialize($settings);
        $response = $this->merchant->purchase($params);
        print "<pre>";
        var_dump($response);
    }

    public function success(){
        $x = $this->session->userdata('data');
        $data = array
        (
            'invoice_id' => $x['id'],
            'invoice_email' => $x['i_email'],
            'total_payment' => $x['i_grant'],
            'token' => $_GET['token'],
            'payer_id' => $_GET['PayerID'],
            'status' => 'Paid',
        );
        $this->data->insert('paypal_info',$data);
        $this->data->update(array('id'=>$x['id']),'invoice',array('payment_status'=>'Paid'));
        $this->session->set_flashdata('msg',"Thank you for your payment :) ");
        redirect('home/paypal_message');

    }
    public function cancel()
    {
        $this->session->set_flashdata('error',"Transaction Has Been Canceled");
        redirect('home/paypal_message');
    }

    public function paypal_message()
    {
        $data['error'] = $this->session->userdata('error');
        $data['msg'] = $this->session->userdata('msg');
        $this->load->view('message',$data);
    }


    public function chat($call = null)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $data = $this->input->post();
            if ($call == 'SendMsg') {
                $x['from'] = $check[0]['id'];
                $x['to'] = $data['userid'];
                $x['notification'] = 'unread';
                $x['message'] = htmlspecialchars($data['msg']);
                $this->data->insert('chat', $x);
            }
            if ($call == 'GetMsg') {
                $id = $data['userid'];
                $xx = $this->data->myquery("SELECT * FROM `chat` WHERE (`to` = '{$id}'  AND `from` = '{$check[0]['id']}') OR (`from` = '{$id}' AND `to` = '{$check[0]['id']}') ORDER BY `id` ASC");
                $this->data->update(array('to' => $check[0]['id'], 'from' => $id), 'chat', array('notification' => 'read'));
                $x = $this->data->fetch('user', array('id' => $id));
                    if (!empty($xx)) {
                        $html = "";
                        foreach ($xx as $k => $v) {
                            $xx[$k]['to'] = $x[0]['username'];
                            $name = ($v['from'] == $check[0]['id']) ? 'Me' : $x[0]['username'];
                            if ($name == 'Me') {
                                $html .= '<ul class="m-b-0">';
                                $html .= '<li class="clearfix">';
                                $html .= '<div class="message-data">';
                                $image = (!empty($check[0]['image'])) ? base_url('csv_files')."/".$check[0]['image'] : base_url('assets_b/images/xs/avatar1.jpg');
                                $html .= '<img src="'.$image.'"';
                                $html .= '</div>';
                                $html .= '<div class="detail-right">';
                                $html .= '<div class="message other-message float-right">';
                                $html .= '<span class="message-data-time d-block mt-1">'.date('H:s',strtotime($v['date'])).'</span>';
                                $html .= '<p style="width: 800px">'.$v['message'].'</p>';
                                $html .= '</div>';
                                $html .= '</div>';
                                $html .= '</li>';
                                $html .= '</ul>';
                            } else {
                                $html .= '<ul class="m-b-0">';
                                $html .= '<li class="clearfix">';
                                $html .= '<div class="message-data float-left">';
                                $image = (!empty($x[0]['image'])) ? base_url('csv_files')."/".$x[0]['image'] : base_url('assets_b/images/xs/avatar1.jpg');
                                $html .= '<img src="'.$image.'"';
                                $html .= '</div>';
                                $html .= '<div class="detail-right">';
                                $html .= '<div class="message my-message">';
                                $html .= '<span class="message-data-time d-block mt-1">'.date('H:s',strtotime($v['date'])).'</span>';
                                $html .= '<p style="width: 800px">'.$v['message'].'</p>';
                                $html .= '</div>';
                                $html .= '</div>';
                                $html .= '</li>';
                                $html .= '</ul>';
                            }
                        }
                        $response['html'] = $html;
                    }

                $response['status'] = "ok";
                $response['user'] = $x[0]['fname'].' '.$x[0]['lname'];
                echo json_encode($response);

            }
        }

    }


    public function SendMail()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $id = "";
            foreach ($x['id'] as $v) {
                $id .= $v . ",";
            }
            $idd = substr($id, 0, -1);
            $data = $this->data->fetch('template', array('seeker_sending_status' => 'other'));
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('home/EmailSeeker') ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Select Mail Template</h4>
                            </div>
                            <input type="hidden" name="id" value="<?= $idd ?>">
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <select name="template_id" class="form-control">
                                            <?php foreach ($data as $v) { ?>
                                                <option value="<?= $v['id'] ?>"><?= $v['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php

        }

    }


    public function EmailSeeker()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $id = $x['id'];
            $data = $this->data->myquery("SELECT * FROM `seeker` WHERE `id` IN ({$id})");
            $email = $this->data->fetch('template', array('id' => $x['template_id']));
            $sub = "INDEGENOUS Mail System";
            foreach ($data as $vv) {
                $msg = str_replace("{name}", $vv['s_first'], $email[0]['email']);
                $this->send($vv['s_email'], $sub, $msg);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function CreateAttender()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            var_dump($x);
            $training = $this->data->fetch('training', array('id' => $x['training_id']));
            if (isset($training[0]['confirm_attender'])) {
                $data['confirm_attender'] = $training[0]['confirm_attender'] + 1;
            } else {
                $data['confirm_attender'] = 1;
            }
            $this->data->update(array('id' => $x['training_id']), 'training', $data);
            $this->data->insert('attender', $x);
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteAttend($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'attender');
            $this->session->set_userdata('msg', "Deleted");
            redirect($_SERVER['HTTP_REFERER']);;

        }
    }

    public function SendInvoice($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $data['single_invoice'] = $this->data->fetch('invoice', array('id' => $id));
            $data['image'] = "http://devlabx.com/ind_dev/assets_b/images/logo_22222.png";
            // echo  APPPATH;die;
            $gg = $this->load->view('invoice_pdf', $data, true);
            $msg = $this->load->view('send_invoice', $data, true);
            $invoice = $data['single_invoice'][0];
            $this->pdf->loadHtml($gg);
            $this->pdf->render();
            $file = $this->pdf->output();
            $filename = "Invoice_id" . $invoice['i_id'] . ".pdf";
            file_put_contents(APPPATH . $filename, $file);
            $config = array(
                'charset' => 'utf-8',
                'wordwrap' => TRUE,
                'mailtype' => 'html'
            );
            $this->email->initialize($config);
            $this->email->from('afridiabrarkhan@gmail.com');
            $this->email->to($invoice['i_email']);
            $this->email->subject("INDEGENOUS Invoice System");
            $this->email->message($msg);
            $this->email->attach(APPPATH . $filename);
            $this->email->send();
            //  $this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
            $this->session->set_userdata('msg', "Invoice Has been sent");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function ViewPdf($id)
    {
        $data['single_invoice'] = $this->data->fetch('invoice', array('id' => $id));
        $data['image'] = "http://devlabx.com/ind_dev/assets_b/images/logo_22222.png";
        // echo  APPPATH;die;
        $gg = $this->load->view('invoice_pdf', $data, true);
        $this->pdf->loadHtml($gg);
        $this->pdf->render();
        $file = $this->pdf->output();
        $this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
        var_dump($file);
    }

    public function Campaign_modal()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->data->fetch('campaign', array('id' => $x['id']));
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('home/Edit_Campaign') ?>/<?= $data[0]['id'] ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Campaign Information</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="p_title" value="<?= $data[0]['p_title'] ?>"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function Edit_Campaign($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'campaign', $x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;

        }

    }

    public function deleteevent($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'event');
            $this->session->set_userdata('msg', 'deleted');
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function AddRemin()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['status'] = "pending";
            $x['user_id'] = $check[0]['id'];
            $this->data->insert('event', $x);
            $this->session->set_userdata('msg', 'Reminder Added');
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }

    public function deletetoDo($id)
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'todo');
            $this->session->set_userdata('msg', 'deleted');
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function Todo()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['user_id'] = $check[0]['id'];
            $x['status'] = "pending";
            $this->data->insert('todo', $x);
            $this->session->set_userdata('msg', 'Todo List Added');
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }

    public function get_task()
    {
        $check = $this->session->userdata('user');
        if (!empty($check)) {
            $x = $this->input->post();
            $ids = "";
            foreach ($x['id'] as $xs) {
                $ids .= $xs . ",";
            }
            $ids = substr($ids, 0, -1);
            $this->data->myquery("UPDATE `todo` SET `status` = 'completed' WHERE `id` IN ({$ids})");
            redirect('home/view/todo');
        }
    }

    public function AddContact()
    {
        $check = $this->session->userdata('user');
        if(!empty($check))
        {
            $x = $this->input->post();
            $xx =  $this->data->fetch('campaign',array('id'=>$x['child_id']));
            $x['send_date'] = date('Y-m-d',strtotime("+{$xx[0]['cam_days']} days"));
            $x['status'] = "Active";
            $x['user_id'] = $check[0]['id'];
            $this->data->insert('contacts',$x);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function AddKnow()
    {
        $check = $this->session->userdata('user');
        if(!empty($check))
        {
            $x = $this->input->post();
            $xx['user_id'] = $check[0]['id'];
            $xx['modified_date'] = date('Y-m-d');
            $xx['status'] = "Active";
            $xx['title'] = $x['title'];
            $xx['description'] = $x['description'];
            $dataaa = $this->upload('file');
            if (isset($dataaa['upload_data']['file_name'])) {
                $xx['file'] = $dataaa['upload_data']['file_name'];
            }
            $this->data->insert('knowledge',$xx);
            $data = $this->data->fetch('knowledge',$xx);
            $new = $data[(count($data) - 1)]['id'];
            $xxx['knowledge_id'] = $new;
            $xxx['user_history_id'] = $check[0]['id'];
            $xxx['history_date'] = date('Y-m-d');
            $this->data->insert('history_knowledge',$xxx);
            $this->session->set_userdata('msg',"Knowledge Added");
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }





}