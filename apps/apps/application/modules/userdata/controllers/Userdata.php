<?php

class Userdata extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function index()
    {
        $data['data'] = $this->db->select('*')->from('user')->get()->result(); //Untuk mengambil data dari database webinar

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/list', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai
    }

    function datasensor()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/list2', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function add()
    {
        $this->load->helper('string');
        $isi = array(

            'name'     => $this->input->post('name'),
            'email'    => $this->input->post('email'),
            'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id'     => $this->input->post('role_id'),
            'is_active'     => $this->input->post('is_active'),
            'date_created'     => time(),
            'token'     => random_string('alnum', 16),
            'HWID'     => $this->input->post('HWID')

        );



        $this->db->insert('user', $isi);
        redirect('userdata');
    }


    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(

                'name'     => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'role_id'     => $this->input->post('role_id'),
                'is_active'     => $this->input->post('is_active'),
                'token'     => $this->input->post('token'),
                'HWID'     => $this->input->post('HWID')

            );

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $id   = $this->input->post('id');
            $this->db->where('id', $id); //difilter berdasarkan id
            $this->db->update('user', $data); //eksekusi update
            redirect('userdata');
        } else {
            $id           = $this->uri->segment(3);
            $data['data'] = $this->db->get_where('user', array('id' => $id))->row_array();

            $datas['title'] = 'User Data';
            $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $datas);
            $this->load->view('templates/sidebar', $datas);
            $this->load->view('templates/topbar', $datas);
            $this->template->load('template1', 'edit', $data);
        }
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            // proses delete data
            $this->db->where('id', $id);
            $this->db->delete('user');
        }
        redirect('userdata');
    }

    function datagrafik()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->limit(1)->get()->result(); //Untuk mengambil data dari database webinar

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/list3', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function grafikjason()
    {
        $data = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result();
        echo json_encode($data);
    }

    function suhutanaman()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/suhutanaman', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }
    function co2tanaman()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/co2tanaman', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function o2tanaman()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/o2tanaman', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function discharge()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/discharge', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function ph()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/ph', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function phakuarium()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/phakuarium', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function suhuakuarium()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/suhuakuarium', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function oxygen()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/oxygen', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function ammonia()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/ammonia', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function lightintensity()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/lightintensity', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function moisture()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/moisture', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function minerals()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/minerals', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function fuzzy()
    {
        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule'] = $this->db->select('*')->from('fuzzyrule')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule2'] = $this->db->select('*')->from('fuzzyrule_phtanaman')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule3'] = $this->db->select('*')->from('fuzzyrule_intentitascahaya_tanaman2')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule4'] = $this->db->select('*')->from('kelembapan_tanaman')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule5'] = $this->db->select('*')->from('co2_tanaman')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule6'] = $this->db->select('*')->from('suhu_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule7'] = $this->db->select('*')->from('ph_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule8'] = $this->db->select('*')->from('oksigen_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule9'] = $this->db->select('*')->from('amoniak_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['sortby2'] = $this->db->select('*')->from('sortby')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(5)->get()->result();

        //$data['data_2'] = $this->db->select('*')->from('bayesprediction')->get()->result(); //Untuk mengambil data dari database webinar

        //   $data['data'] = $this->db->select('*')->from('datasensor')->get()->result(); //Untuk mengambil data dari database webinar
        //$data['rule'] = $this->db->select('*')->from('fuzzyrule_suhu_tanaman')->get()->result(); //Untuk mengambil data dari database webinar
        $data['datax'] = $this->db->select('*')->from('datasensor')->order_by('id', 'DESC')->limit(1)->get()->result(); //menapilkan data gauge

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/fuzzy', $data);
    }

    function fuzzyrule()
    {
        $datas['title'] = 'User Data';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule'] = $this->db->select('*')->from('fuzzyrule')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule2'] = $this->db->select('*')->from('fuzzyrule_phtanaman')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule3'] = $this->db->select('*')->from('fuzzyrule_intentitascahaya_tanaman2')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule4'] = $this->db->select('*')->from('kelembapan_tanaman')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule5'] = $this->db->select('*')->from('co2_tanaman')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule6'] = $this->db->select('*')->from('suhu_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule7'] = $this->db->select('*')->from('ph_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule8'] = $this->db->select('*')->from('oksigen_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['rule9'] = $this->db->select('*')->from('amoniak_akuarium')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['sortby2'] = $this->db->select('*')->from('sortby')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(5)->get()->result();

        //   $data['data'] = $this->db->select('*')->from('datasensor')->get()->result(); //Untuk mengambil data dari database webinar
        //$data['rule'] = $this->db->select('*')->from('fuzzyrule_suhu_tanaman')->get()->result(); //Untuk mengambil data dari database webinar
        $data['datax'] = $this->db->select('*')->from('datasensor')->order_by('id', 'DESC')->limit(1)->get()->result(); //menapilkan data gauge

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'userdata/fuzzyrule', $data);
    }

    function edit2()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('fuzzyrule', $data);
            redirect('userdata');
        }
    }

    function edit22()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('fuzzyrule_phtanaman', $data);
            redirect('userdata');
        }
    }
    function edit3()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('fuzzyrule_intentitascahaya_tanaman2', $data);
            redirect('userdata');
        }
    }

    function edit4()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('kelembapan_tanaman', $data);
            redirect('userdata');
        }
    }

    function edit5()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('co2_tanaman', $data);
            redirect('userdata');
        }
    }
    function edit6()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('suhu_akuarium', $data);
            redirect('userdata');
        }
    }

    function edit7()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('ph_akuarium', $data);
            redirect('userdata');
        }
    }

    function edit8()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('oksigen_akuarium', $data);
            redirect('userdata');
        }
    }

    function edit9()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'min'     => $this->input->post('min'),
                'mid'     => $this->input->post('mid'),
                'max'     => $this->input->post('max')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('amoniak_akuarium', $data);
            redirect('userdata');
        }
    }

    function edit10()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'sortby'     => $this->input->post('min')
            );
            $id   = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('sortby', $data);
            redirect('userdata');
        }
    }
}
