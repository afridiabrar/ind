<?php

class Super extends CI_Controller
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

    public function cron()
    {
        $data = $this->data->fetch('contacts', array('status' => 'Active'));
        foreach ($data as $k => $v) {
            $x = $this->data->fetch('campaign', array('p_id' => $v['parent_id'], 'id' => $v['child_id']));
            $date = date('Y-m-d', strtotime("+{$x[0]['cam_days']} days"));
            if ($date == date('Y-m-d')) {
                $sub = $x[0]['cam_title'];
                $this->send($v['email'], $sub, $x[0]['cam_email']);
            }
        }
    }

    public function view($page = "index")
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $data['title'] = ucfirst($page);
            $data['super'] = $check[0];
            $data['msg'] = $this->session->userdata('msg');
            $this->session->unset_userdata('msg');

            $data['reminder'] = $this->data->fetch('event');
            $data['todo'] = $this->data->fetch('todo', array('user_id' => '0'));
            $data['employer'] = $this->data->fetch('employer');
            $data['user'] = $this->data->fetch('user');
            $data['industry'] = $this->data->fetch('industry');
            $data['template'] = $this->data->fetch('template');
            $data['total_employer'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `employer`");
            $data['total_seeker'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `seeker`");
            $data['total_project'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `project`");
            $data['total_user'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `user`");
            $data['total_todo'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `todo`");
            $data['total_event'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `event`");
            $date = date('Y-m-d');
            $data['total_invoice'] = $this->data->myquery("SELECT SUM(`i_grant`) as `total` FROM `invoice` WHERE  `i_end` > '$date'");
            $data['supplier'] = $this->data->fetch('supplier', array('s_child_id' => '0'));
            $data['training'] = $this->data->fetch('training');
            $data['campaign'] = $this->data->fetch('campaign');
            $data['invoice'] = $this->data->fetch('invoice');
            $data['seeker'] = $this->data->fetch('seeker');
            $id = $this->uri->segment(4);
            $data['e_user'] = $this->data->fetch('user', array('id' => $id));
            $data['single_invoice'] = $this->data->fetch('invoice', array('id' => $id));
            $data['project'] = $this->data->fetch('project');
            foreach ($data['project'] as $k => $v) {
                $x = $this->data->myquery("SELECT COUNT(`id`) as `total_applicanttttt` FROM `seeker` WHERE `s_state` = '{$v['state']}'
                                      AND `s_industry` = '{$v['industry']}'");
                $xx = $this->data->fetch('user', array('id' => $v['user_id']));
                $data['project'][$k]['seeker'] = (!empty($x) ? $x : array());
                $data['project'][$k]['user'] = (!empty($xx)) ? $xx : array();
            }
            $id = $this->uri->segment(4);
            $data['single_template'] = $this->data->fetch('template', array('id' => $id));
            $data['info_seeker'] = $this->data->fetch('seeker_info', array('seeker_id' => $id));
            $data['supp_data'] = $this->data->fetch('supplier', array('id' => $id));
            $data['supp_dataa'] = $this->data->fetch('supplier', array('s_child_id' => $id));
            $data['seeker_data'] = $this->data->fetch('seeker', array('project_id' => $id));
            $data['project_data'] = $this->data->fetch('project', array('id' => $id));
            $data['seeker_dataa'] = $this->data->fetch('seeker', array('id' => $id));
            $data['interview'] = $this->data->fetch('interview_template', array('seeker_id' => $id));
            $data['question'] = $this->data->fetch('question', array('seeker_id' => $id));
            $data['s_training'] = $this->data->fetch('training', array('id' => $id));
            $data['s_course'] = $this->data->fetch('training_course', array('training_id' => $id));
            $data['his_know'] = $this->data->fetch('knowledge', array('id' => $id));
            //Join
            $data['cour_training'] = $this->data->myquery("SELECT `training_course`.`course_type` as `c_name`,`training_course`.`course_type` 
                                              as `type`,`training_course`.`id` as `id`
                                        ,`training_course`.`course_training` as `training`,`training_course`.`course_duration` as `dur`,
                                  `training`.`t_title` as `title`       
                                      FROM `training_course` INNER JOIN `training` ON `training_course`.`training_id` = `training`.`id`");

            $data['attender'] = $this->data->myquery(
                "SELECT `attender`.`name` as `name`,`attender`.`email` as `email`,`attender`.`phone` as `phone`
                    ,`attender`.`attend_status` as `status`,`attender`.`id` as `id`,`training`.`t_title` as `t_tile`,
                    `attender`.`training_id` as `training_id`
                    FROM `attender` INNER JOIN  `training` ON `attender`.`training_id` = `training`.`id`      
            ");

            $data['knowledge'] = $this->data->fetch('knowledge');
            foreach ($data['knowledge'] as $k => $v) {
                $x = $this->data->fetch('user', array('id' => $v['user_id']));
                $data['knowledge'][$k]['user'] = (!empty($x)) ? $x : array();
            }
            $data['msgg'] = $this->data->fetch('user');
            foreach ($data['msgg'] as $k => $v) {
                $x = $this->data->myquery("SELECT DISTINCT(`from`),(`message`),(`date`) FROM `chat` WHERE `to` = '{$check[0]['id']}' AND `from` = '{$v['id']}' AND `notification` = 'unread' ORDER BY `date` DESC ");
                $xx = $this->data->myquery("SELECT count(`id`) as `total` FROM `chat` WHERE `to` = '{$check[0]['id']}' AND `from` = '{$v['id']}' AND `notification` = 'unread'");
                $data['msgg'][$k]['msg'] = (!empty($x)) ? $x : array();
                $data['msgg'][$k]['totall'] = (!empty($xx)) ? $xx : array();
            }
            $data['userr'] = $this->data->fetch('user');

            $this->load->view('super/header', $data);
            $this->load->view('super/' . $page);
            $this->load->view('super/footer');
        } else {
            $this->login();
        }

    }

    public function login()
    {
        $data['msg'] = $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
        $this->session->unset_userdata('super');
        $this->load->view('super/login', $data);
    }

    public function do_login()
    {
        $data = $this->input->post();
        $data['type'] = 'Admin';
        $check = $this->data->fetch('user', $data);
        if (!empty($check)) {
            $this->session->set_userdata('super', $check);
        } else {
            $this->session->set_userdata('msg', "Wrong Credential");
        }
        redirect('super/');
    }

    public function Logout()
    {
        $this->session->unset_userdata('super');
        $this->login();
    }

    public function CreateEmployer()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->security->xss_clean($data);
            $x['e_status'] = "new";
            $this->data->insert('employer', $x);
            $this->session->set_userdata('msg', "Employer Information Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteEmployer($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'employer');
            $this->session->set_userdata('msg', "Employer Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function employer_modal()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx = $this->data->fetch('employer', array('id' => $x['id']));
            $data = $xx[0];
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('super/employer_edit') ?>/<?= $data['id'] ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Employer Information</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="c_name" value="<?= $data['c_name'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="f_name" value="<?= $data['f_name'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="l_name" value="<?= $data['l_name'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Company Email</label>
                                        <input type="text" name="c_email" value="<?= $data['c_email'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Employer Email</label>
                                        <input type="text" name="e_email" value="<?= $data['e_email'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="e_name" value="<?= $data['e_phone'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="e_designation" value="<?= $data['e_designation'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="e_status">
                                            <option value="Administration"
                                                <?= ($data['e_status'] == 'new') ? "selected" : "" ?>>
                                                New
                                            </option>
                                            <option value="Advertisement"
                                                <?= ($data['e_status'] == 'old') ? "selected" : "" ?>>
                                                Old
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

    public function employer_edit($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'employer', $x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function CreateSupplier()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->security->xss_clean($data);
            $this->data->insert('supplier', $x);
            $this->session->set_userdata('msg', "Supplier Information Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function ChildSupplier($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->security->xss_clean($data);
            $x['s_child_id'] = $id;
            $this->data->insert('supplier', $x);
            $this->session->set_userdata('msg', "Added");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function editSupp($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $data = $this->input->post();
            $this->data->update(array('id' => $id), 'supplier', $data);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function DeleteSupplier($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'supplier');
            $this->session->set_userdata('msg', "Employer Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function EditPassword()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            if ($x['password'] == $check[0]['password']) {
                if ($x['password1'] == $x['password2']) {
                    $this->data->update(array('id' => $check[0]['id']), 'user', array('password' => $x['password1']));
                    $this->session->set_userdata("super", $check);
                    $this->session->set_userdata('msg', "Update");
                } else {
                    $this->session->set_userdata('msg', "Password Mis Match");
                }
            } else {
                $this->session->set_userdata('msg', "Current Password  don't match");
            }
            $this->session->set_userdata("super", $check);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function training($call = null)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            if ($call == 'CreateTraining') {
                $data = $this->input->post();
                $x = $this->security->xss_clean($data);
                $x['t_date'] = date('Y-m-d');
                $this->data->insert('training', $x);
                $this->session->set_userdata('msg', "Training Information Added");
                redirect($_SERVER['HTTP_REFERER']);;
            } elseif ($call == 'DeleteTraining') {
                $check = $this->session->userdata('super');
                if (!empty($check)) {
                    $id = $this->uri->segment();
                    var_dump($id);
                    die;
                    $this->data->delete(array('id' => $id), 'supplier');
                    $this->session->set_userdata('msg', "Employer Deleted");
                    redirect($_SERVER['HTTP_REFERER']);;
                }
            } elseif ($call == 'AddCourse') {
                $data = $this->input->post();
                $x = $this->security->xss_clean($data);
                $this->data->insert('training_course', $x);
                $this->session->set_userdata('msg', "Course Information Added");
                redirect($_SERVER['HTTP_REFERER']);;
            } elseif ($call == 'training_edit') {
                $data = $this->input->post();
                $id = $this->uri->segment(4);
                $this->data->update(array('id' => $id), 'training', $data);
                $this->session->set_userdata('msg', "Training Edit");
                redirect($_SERVER['HTTP_REFERER']);;

            }

        }
    }

    public function course_modal()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('super/CreateCourse') ?>/<?= $x['id'] ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Course Information</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                        <input type="text" name="course_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Type</label>
                                        <input type="text" name="course_type" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Training</label>
                                        <input type="text" name="course_training" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Duration</label>
                                        <input type="text" name="course_duration" class="form-control">
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

    public function see_course_modal()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->data->fetch('training_course', array('id' => $x['id']));

            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('super/editCourse') ?>/<?= $data[0]['id'] ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Course Information</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                        <input type="text" name="course_name" value="<?= $data[0]['course_name'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Type</label>
                                        <input type="text" name="course_type" value="<?= $data[0]['course_type'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Training</label>
                                        <input type="text" name="course_training"
                                               value="<?= $data[0]['course_training'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Duration</label>
                                        <input type="text" name="course_duration"
                                               value="<?= $data[0]['course_duration'] ?>"
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

    public function Campaign_modal()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->data->fetch('campaign', array('id' => $x['id']));

            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('super/Edit_Campaign') ?>/<?= $data[0]['id'] ?>">
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
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'campaign', $x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;

        }

    }


    public function editCourse($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'training_course', $x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function CreateCourse($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['training_id'] = $id;
            $this->data->insert('training_course', $x);
            $this->session->set_userdata('msg', "Course Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function deletecourse($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'training_course');
            $this->session->set_userdata('msg', "Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function campaign($call = null)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            if ($call == 'CreateCampaign') {
                $data = $this->input->post();
                $x = $this->security->xss_clean($data);
                $this->data->insert('campaign', $x);
                $this->session->set_userdata('msg', "Campaign Added");
                redirect($_SERVER['HTTP_REFERER']);;
            } elseif ($call == 'ChildCampaign') {
                $data = $this->input->post();
                $id = $this->uri->segment(4);
                $x = $this->security->xss_clean($data);
                $x['p_id'] = $id;
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

    public function AddInvoice()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['i_grant'] = 0;
            $x['i_desc'] = json_encode($x['i_desc']);
            $desc = json_decode($x['i_desc'], true);
            for ($i = 0; $i < count($desc['desc']); $i++) {
                $x['i_grant'] += $desc['amount'][$i];
            }
            $x['status'] = "Pending";
            $x['payment_status'] = "UnPaid";
            $this->data->insert('invoice', $x);
            $this->session->set_userdata('msg', "Added Invoice");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteInvoice($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'invoice');
            $this->session->set_userdata('msg', "Invoice Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function AddSeeker()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->upload('s_cv');
            if (isset($data['upload_data']['file_name'])) {
                $x['s_cv'] = $data['upload_data']['file_name'];
            }
            $x['s_status'] = "New_Applicant";
            $this->data->insert('seeker', $x);
            $this->session->set_userdata('msg', "Job Seeker Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function EditSeeker($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->upload('s_cv');
            if (isset($data['upload_data']['file_name'])) {
                $x['s_cv'] = $data['upload_data']['file_name'];
            }
            $this->data->update(array('id' => $id), 'seeker', $x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;
        }
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

    public function seekerStatus($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'seeker', $x);
            $this->session->set_userdata('msg', "Seeker Moved to Qualified");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteSeeker($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->delete(array('id' => $id), 'seeker');
            $this->session->set_userdata('msg', "Deleted");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }


    public function CreateIndusry()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $do_check = $this->data->fetch('industry', array('industry' => $x['industry']));
            if (empty($do_check)) {
                $this->data->insert('industry', $x);
                $this->session->set_userdata('msg', "Industry Added");
            } else {
                $this->session->set_userdata('msg', "Already Added");

            }
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function DeleteIndustry($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'industry');
            $this->session->set_userdata('msg', "Delete");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function industry_modal()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx = $this->data->fetch('industry', array('id' => $x['id']));
            $data = $xx[0];
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('super/industry_edit') ?>/<?= $data['id'] ?>">
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
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'industry', $x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }


    public function CreateProject()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['status'] = "new";
            $data = $this->data->fetch('employer', array('id' => $x['c_id']));
            $x['com_name'] = $data[0]['c_name'];
            $this->data->insert('project', $x);
            $this->session->set_userdata('msg', "Project Added");
            redirect($_SERVER['HTTP_REFERER']);;
        }
    }

    public function editProject($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'project', $x);
            $this->session->set_userdata('msg', "Updated");
            redirect($_SERVER['HTTP_REFERER']);;

        }
    }

    public function MoveModal()
    {
        $check = $this->session->userdata('super');
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
                        <?= form_open('super/MoveToProject') ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Project Title</label>
                                <input type="hidden" value="<?= $x['id'] ?>" name="seeker_id">
                                <div class="form-line">
                                    <select required="required" name="project_id" class="form-control">
                                        <option hidden selected>Select Project Title</option>
                                        <?php foreach ($com as $v) { ?>
                                            <option value="<?= $v['id'] ?>"><?= $v['pro_name'] ?>(<?= $v['com_name'] ?>
                                                )
                                            </option>
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

    public function MoveModal11()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $com = $this->data->fetch('project');
            ?>
            <div class="modal fade" id="addevent" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Move To </h4>
                        </div>
                        <?= form_open('super/MoveToProject') ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Project Title</label>
                                <input type="hidden" value="<?= $x['id'] ?>" name="seeker_id">
                                <div class="form-line">
                                    <select required="required" name="project_id" class="form-control">
                                        <option hidden selected>Select Project Title</option>
                                        <?php foreach ($com as $v) { ?>
                                            <option value="<?= $v['id'] ?>"><?= $v['pro_name'] ?>(<?= $v['com_name'] ?>
                                                )
                                            </option>
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
        $check = $this->session->userdata('super');
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
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx['seeker_id'] = $id;
            $xx['info_rating'] = $x['info_rating'];
            $xx['info_note'] = $x['info_note'];
            $this->data->insert('seeker_info', $xx);
            redirect($_SERVER['HTTP_REFERER']);;
        }

    }

    public function InfoChange($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['seeker_id'] = $id;
            $this->data->update(array('seeker_id'), 'seeker_info', $x);
            redirect($_SERVER['HTTP_REFERER']);;
        }

    }

    public function UpdatePol($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx['police_check'] = (!empty($x['police_check'])) == 'on' ? "1" : 0;
            $xx['police_char'] = (!empty($x['police_char'])) == 'on' ? "1" : 0;
            $xx['police_note'] = $x['police_note'];
            $this->data->update(array('seeker_id' => $id), 'seeker_info', $xx);
            redirect($_SERVER['HTTP_REFERER']);;

        }
    }


    public function changeStatus()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();

            $data = $this->data->fetch('seeker', array('id' => $x['id']));
            $email = $this->data->fetch('template', array('seeker_sending_status' => $x['status']));
            $this->data->update(array('id' => $x['id']), 'seeker', array('verification_status' => $x['status']));
            if (!empty($email[0]['seeker_sending_status'])) {
                $msg = str_replace("{name}", $data[0]['s_first'], $email[0]['email']);
                $sub = "Job Seeker Pipeline";
                $config = array(
                    'charset' => 'utf-8',
                    'wordwrap' => TRUE,
                    'mailtype' => 'html'
                );
                $this->email->initialize($config);
                $this->email->from('afridiabrarkhan@gmail.com');
                $this->email->to($data[0]['s_email']);
                $this->email->subject($sub);
                $this->email->message($msg);
                $this->email->send();
            }
            redirect($_SERVER['HTTP_REFERER']);;

        }
    }

    public function AddRemin()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['status'] = "pending";
            $this->data->insert('event', $x);
            $this->session->set_userdata('msg', 'Reminder Added');
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }

    public function Todo()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['status'] = "pending";
            $this->data->insert('todo', $x);
            $this->session->set_userdata('msg', 'Todo List Added');
            header("Location:" . $_SERVER['HTTP_REFERER']);

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

    public function deletetoDo($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'todo');
            $this->session->set_userdata('msg', 'deleted');
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function admin()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->upload('image');
            if (isset($data['upload_data']['file_name'])) {
                $x['image'] = $data['upload_data']['file_name'];
            }
            $x['status'] = "Active";
            $this->data->insert('user', $x);
            $this->session->set_userdata('msg', 'User Added');
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }

    public function DeleteUser($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'user');
            $this->session->set_userdata('msg', 'deleted');
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function EditAdmin($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $id), 'user', $x);
            $this->session->set_userdata('msg', 'Updated');
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }

    public function New_template($id)
    {
        $check = $this->session->userdata('super');
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


    public function DeleteProject($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'project');
            $this->session->set_userdata('msg', "Deleted");
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }

    public function Template($call = null)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            if ($call == 'AddTemplate') {
                $x['status'] = "Active";
                $x['user_id'] = $check[0]['id'];
                $this->data->insert('template', $x);
                $this->session->set_userdata('msg', "Template Added");
            } elseif ($call == 'UpdateTemplate') {
                $id = $this->uri->segment(4);
                $this->data->update(array('id' => $id), 'template', $x);
                $this->session->set_userdata('msg', "Updated");
            } elseif ($call == 'DeleteTemplate') {
                $id = $this->uri->segment(4);
                $this->data->delete(array('id' => $id), 'template');
                $this->session->set_userdata('msg', "Deleted");

            }
            redirect($_SERVER['HTTP_REFERER']);;
        }

    }

    public function CreateTraining()
    {
        $check = $this->session->userdata('super');
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

    public function CreateAttender()
    {
        $check = $this->session->userdata('super');
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
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $this->data->delete(array('id' => $id), 'attender');
            $this->session->set_userdata('msg', "Deleted");
            redirect($_SERVER['HTTP_REFERER']);;

        }
    }

    public function send($to, $sub, $msg)
    {
        $config = array(
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'mailtype' => 'html'
        );
        $this->email->initialize($config);
        $this->email->from('abrar.afridi@iunc.edu.pk');
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
    }

    public function SendInvoice($id)
    {
        $check = $this->session->userdata('super');
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


    public function ModalStatus()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {

            $x = $this->input->post();
            var_dump($x);
            $seeker_dataa = $this->data->fetch('seeker', array('id' => $x['id']));
            ?>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('super/changeStatus') ?>">
                            <div class="modal-header">
                                <h4 class="title" id="largeModalLabel">Course Information</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $seeker_dataa[0]['id'] ?>">
                                        <select name="status" class="form-control">
                                            <option value="Step1" <?= $seeker_dataa[0]['verification_status'] == 'Step1' ? "selected" : ""
                                            ?>>
                                                Cv Information
                                            </option>
                                            <option value="Step2"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step2' ? "selected" : "" ?>
                                            >Reference Check & Police Verification
                                            </option>
                                            <option value="Step3"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step3' ? "selected" : "" ?>>
                                                Work Readiness
                                            </option>
                                            <option value="Step4"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step4' ? "selected" : "" ?>
                                            >Mock Interview
                                            </option>
                                            <option
                                                    value="Step5"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step5' ? "selected" : "" ?>
                                            >Address Barriers
                                            </option>
                                            <option value="Step6"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step6' ? "selected" : "" ?>>
                                                Job Seeker Ready
                                            </option>
                                            <option value="Step7"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step7' ? "selected" : "" ?>>
                                                Completed
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

    public function SendMail()
    {
        $check = $this->session->userdata('super');
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
                        <form method="post" action="<?= site_url('super/EmailSeeker') ?>">
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
        $check = $this->session->userdata('super');
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

    public function chat1($call = null)
    {
        $check = $this->session->userdata('super');
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
                if (!empty($xx)) {
                    foreach ($xx as $k => $v) {
                        $x = $this->data->fetch('user', array('id' => $id));
                        $xx[$k]['to'] = $x[0]['username'];
                        json_encode($x);
                        $name = ($v['from'] == $check[0]['id']) ? 'Me' : $x[0]['username'];
                        if ($name == 'Me') { ?>
                            <ul class="m-b-0">
                                <li class="clearfix">
                                    <div class="message-data">
                                        <img src="<?= base_url('assets_b') ?>/images/xs/avatar7.jpg" alt="avatar">
                                    </div>
                                    <div class="detail-right">
                                        <div class="message other-message float-right">
                                            <span class="message-data-time d-block mt-1">10:10</span>
                                            <p><?= $v['message'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <ul class="m-b-0">
                                <li class="clearfix">
                                    <div class="message-data float-left">
                                        <img src="<?= base_url('assets_b') ?>/images/xs/avatar7.jpg" alt="avatar">
                                    </div>
                                    <div class="detail-right">
                                        <div class="message my-message">
                                            <span class="message-data-time d-block mt-1">10:12</span>
                                            <p><?= $v['message'] ?>?</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php }
                    }
                }
            }
        }

    }

    public function chat($call = null)
    {
        $check = $this->session->userdata('super');
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
                            $image = (!empty($check[0]['image'])) ? base_url('csv_files') . "/" . $check[0]['image'] : base_url('assets_b/images/xs/avatar1.jpg');
                            $html .= '<img src="' . $image . '"';
                            $html .= '</div>';
                            $html .= '<div class="detail-right">';
                            $html .= '<div class="message other-message float-right">';
                            $html .= '<span class="message-data-time d-block mt-1">' . date('H:s', strtotime($v['date'])) . '</span>';
                            $html .= '<p style="width: 800px">' . $v['message'] . '</p>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $html .= '</li>';
                            $html .= '</ul>';
                        } else {
                            $html .= '<ul class="m-b-0">';
                            $html .= '<li class="clearfix">';
                            $html .= '<div class="message-data float-left">';
                            $image = (!empty($x[0]['image'])) ? base_url('csv_files') . "/" . $x[0]['image'] : base_url('assets_b/images/xs/avatar1.jpg');
                            $html .= '<img src="' . $image . '"';
                            $html .= '</div>';
                            $html .= '<div class="detail-right">';
                            $html .= '<div class="message my-message">';
                            $html .= '<span class="message-data-time d-block mt-1">' . date('H:s', strtotime($v['date'])) . '</span>';
                            $html .= '<p style="width: 800px">' . $v['message'] . '</p>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $html .= '</li>';
                            $html .= '</ul>';
                        }
                    }
                    $response['html'] = $html;
                }
                $response['status'] = "ok";
                $response['user'] = $x[0]['fname'] . ' ' . $x[0]['lname'];
                echo json_encode($response);
            }
        }

    }

    public function ajaxCampaign()
    {
        $x = $this->input->post();
        $data = $this->data->fetch('campaign', array('p_id' => $x['id']));
        echo json_encode($data);

    }

    public function AddContact()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx = $this->data->fetch('campaign', array('id' => $x['child_id']));
            $x['send_date'] = date('Y-m-d', strtotime("+{$xx[0]['cam_days']} days"));
            $x['status'] = "Active";

            $this->data->insert('contacts', $x);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function get_task()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $ids = "";
            foreach ($x['id'] as $xs) {
                $ids .= $xs . ",";
            }
            $ids = substr($ids, 0, -1);
            $this->data->myquery("UPDATE `todo` SET `status` = 'completed' WHERE `id` IN ({$ids})");
            redirect('super/view/todo');
        }
    }

    public function form_builder()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            if (!empty($x['title'])) {
                $ques = count($x['title']);
                for ($i = 0; $i < $ques; $i++) {
                    $data = array(
                        'seeker_id' => $x['seeker_id'],
                        'title' => $x['title'][$i],
                        'ques' => $x['ques'][$i],
                        'status' => "Not Defined"
                    );
                    $this->data->insert('question', $data);
                }
            }
            if (!empty($x['question'])) {
                $mc = count($x['question']);
                for ($k = 0; $k < $mc; $k++) {
                    $data = array(
                        'seeker_id' => $x['seeker_id'],
                        'title' => $x['title'][$k],
                        'question' => $x['question'][$k],
                        'q1' => $x['q1'][$k],
                        'q2' => $x['q2'][$k],
                        'q3' => $x['q3'][$k],
                        'q4' => $x['q4'][$k],
                        'status' => "Not Defined"
                    );
                    $this->data->insert('question', $data);

                }
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function ModalInterview()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $data = $this->data->fetch('question', array('id' => $x['id']));
            if (!empty($data[0]['ques'])) {
                ?>
                <form action="<?= site_url('super/updateQuest') ?>/<?= $data[0]['id'] ?>" method="post">
                    <div class="row" style="margin-top: 70px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Question</label>
                                <textarea class="form-control" name="ques" rows="3"><?= $data[0]['ques'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ans</label>
                                <textarea class="form-control" name="ans"
                                          rows="3"><?= (!empty($data[0]['ans'])) ? $data[0]['ans'] : "" ?></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" onclick="updateeeee('<?= $data[0]['id'] ?>')" style="float: right"
                        class="btn-primary">Update
                </button>
            <?php } elseif (!empty($data[0]['question'])) {
                ?>
                <div class="row" style="position: relative;top: 90px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" value="<?= $data[0]['question'] ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" style="position: relative;top: 91px;">
                    <div class="col-md-12">
                        <div class="form-group" style="float: left">
                            <input type="radio" name="checkmc"
                                   value="a" <?= ($data[0]['radioboxx'] == 'a') ? "checked" : "a" ?>
                                   style="float: left;display: block;margin-top: 4px">
                            <p style="width: 125px"><?= (!empty($data[0]['q1'])) ? $data[0]['q1'] : "" ?></p>
                        </div>
                        <div class="form-group" style="float: left">
                            <input type="radio" name="checkmc"
                                   value="b" <?= ($data[0]['radioboxx'] == 'b') ? "checked" : "b" ?>
                                   style="float: left;display: block;margin-top: 4px">
                            <p style="width: 125px"><?= (!empty($data[0]['q2'])) ? $data[0]['q2'] : "" ?></p>
                        </div>
                        <div class="form-group" style="float: left">
                            <input type="radio" name="checkmc"
                                   value="c" <?= ($data[0]['radioboxx'] == 'c') ? "checked" : "c" ?>
                                   style="float: left;display: block;margin-top: 4px">
                            <p style="width: 125px"><?= (!empty($data[0]['q3'])) ? $data[0]['q3'] : "" ?></p>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="checkmc"
                                   value="d" <?= ($data[0]['radioboxx'] == 'd') ? "checked" : "d" ?>
                                   style="float: left;display: block;margin-top: 4px">
                            <p><?= (!empty($data[0]['q4'])) ? $data[0]['q4'] : "" ?></p>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="updateeeeemqs('<?= $data[0]['id'] ?>')"
                        style="float: right;position: relative;top: 96px" class="btn-primary">Update
                </button>
            <?php }
        }

    }

    public function updateQuest()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->update(array('id' => $x['id']), 'question', $x);
        }
    }

    public function updateMcq()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $xx['question'] = $x['question'];
            $xx['radioboxx'] = $x['checkmc'];

            $this->data->update(array('id' => $x['id']), 'question', $xx);
        }
    }

    public function AddKnow()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
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
            $this->data->insert('knowledge', $xx);
            $data = $this->data->fetch('knowledge', $xx);
            $new = $data[(count($data) - 1)]['id'];
            $xxx['knowledge_id'] = $new;
            $xxx['user_history_id'] = $check[0]['id'];
            $xxx['history_date'] = date('Y-m-d');
            $this->data->insert('history_knowledge', $xxx);
            $this->session->set_userdata('msg', "Knowledge Added");
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
    }

    public function Knowledge()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $id = $this->input->post();
            $knowledge = $this->data->fetch('knowledge', array('id' => $id['id']));
            $query = $this->data->myquery("
            SELECT `history_knowledge`.`history_date` as `history_date`,`history_knowledge`.`knowledge_id` as `knowledge_id`,`user`.`username` as `username`
            FROM `history_knowledge` LEFT JOIN `user` ON `history_knowledge`.`user_history_id` = `user`.`id` 
            WHERE `knowledge_id` = {$id['id']}
            ");
            ?>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger" onclick="backkk()"><i class="fa fa-arrow-circle-left"></i></button>
                </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-3 col-md-4" style="position: relative;bottom: 9px;">
                <div class="hidden-xs">
                    <div id="plist" class="people-list">
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            <?php foreach ($query as  $v){ ?>
                            <li class="clearfix">
                                <div class="float-left list-left">
                                    <div class="about">
                                        <div class="msg">Last Modified by :<?= $v['username'] ?></div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="time">Last Modified Date</div>
                                    <div class="badge badge-danger bg-danger text-white"><?= date('M d Y',strtotime($v['history_date'])) ?></div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div id="chat-left" class="chat bg-white">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="chat-about">
                                    <h4 id="showname" style="text-align: center"><?= $knowledge[0]['title'] ?></h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inner-fonts" style="position: absolute;right: 3px;top:9px">
                                    <a href="<?= site_url('super/knowpdf')?>/<?= $knowledge[0]['id'] ?>"><i title="Pdf" class="fa fa-file-pdf-o" style="color: #0000cc;font-size: 18px;position: relative;right: 4px;"></i> </a>
                                    <a href="<?= site_url('super/view/edit_knowledge')?>/<?= $knowledge[0]['id']?>"><i title="Edit" class="fa fa-edit"
                                                   style="color: #0000cc;font-size: 20px"></i></a>
                                    <a href="<?= site_url('super/deleteknowledge')?>/<?= $knowledge[0]['id'] ?>"><i title="Delete" class="icon-close"
                                                   style="color: red;font-size: 20px"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history" style="min-height: 500px">
                        <?= $knowledge[0]['description'] ?>
                        <?php $file = (!empty($knowledge[0]['file'])) ? $knowledge[0]['file'] : "" ?>
                        <img src="<?= $file ?>">
                    </div>
                </div>
            </div>
            </div>
            <?php
        }
    }

    public function deleteknowledge($id)
    {
        $check = $this->session->userdata('super');
        if(!empty($check))
        {
            $this->data->delete(array('id'=>$id),'knowledge');
            $this->data->delete(array('knowledge_id'=>$id),'history_knowledge');
            $this->session->set_userdata('msg', "Deleted");
            header("Location:" . $_SERVER['HTTP_REFERER']);

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


    public function knowpdf($id)
    {
        $check = $this->session->userdata('super');
        if(!empty($check))
        {
          $data['know'] = $this->data->fetch('knowledge',array('id'=>$id));
          $view = $this->load->view('knowledge',$data,true);
          $this->pdf->loadHtml($view);
          $this->pdf->render();
          $this->pdf->output();
            $this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
        }
    }

    public function LastModified()
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $this->data->fetch('history_knowledge');
            $query = $this->data->myquery("
            SELECT `history_knowledge`.`history_date` as `history_date`,`history_knowledge`.`knowledge_id` as `knowledge_id`,`user`.`username` as `username`
            FROM `history_knowledge` LEFT JOIN `user` ON `history_knowledge`.`user_history_id` = `user`.`id` 
            WHERE `knowledge_id` = {$x['id']}
            ");
            ?>
            <div class="chat-header clearfix">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="chat-about">
                            <h4 id="showname" style="text-align: center">All Modified Detail</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="myTable">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>History Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($query as $v) { ?>
                                <tr class="gradeA">
                                    <td><?= $v['username'] ?></td>
                                    <td><?= $v['history_date'] ?></td>
                                    <td class="actions">
                                        <a href="<?= site_url('super/view/edit_knowledge') ?>/<?= $v['knowledge_id'] ?>">
                                            <button class="btn btn-sm btn-icon btn-pure btn-default">
                                                <i class="fa fa-edit" aria-hidden="true"></i></button>
                                        </a>
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                onclick="#">
                                            <i class="icon-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            </script>
            <?php
        }
    }

    public function EditKnow($id)
    {
        $check = $this->session->userdata('super');
        if (!empty($check)) {
            $x = $this->input->post();
            $x['modified_date'] = date('Y-m-d');
            $x['user_id'] = $check[0]['id'];
            $this->data->update(array('id' => $id), 'knowledge', $x);
            $data['knowledge_id'] = $id;
            $data['user_history_id'] = $check[0]['id'];
            $data['history_date'] = date('Y-m-d');
            $this->data->insert('history_knowledge', $data);
            $this->session->set_userdata('msg', "Updated");
            header("Location:" . $_SERVER['HTTP_REFERER']);


        }
    }


}