<?php

class Historydevice extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function index()
    {
        $data['data'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //Untuk mengambil data dari database webinar

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/list', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai
    }

    public function control()
    {
        $data['title'] = 'Schedule';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('historydevice/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $jadwal_pupuk = $this->input->post('jadwal_pupuk');
            $waktu_pakan_ikan = $this->input->post('waktu_pakan_ikan');
            $waktu_pakan_ikan2 = $this->input->post('waktu_pakan_ikan2');
            $waktu_pakan_ikan3 = $this->input->post('waktu_pakan_ikan3');
            $waktu_vitamin_ikan = $this->input->post('waktu_vitamin_ikan');
            $email = $this->input->post('email');

            $this->db->set('name', $name);
            $this->db->set('jadwal_pupuk', $jadwal_pupuk);
            $this->db->set('waktu_pakan_ikan', $waktu_pakan_ikan);
            $this->db->set('waktu_pakan_ikan2', $waktu_pakan_ikan2);
            $this->db->set('waktu_pakan_ikan3', $waktu_pakan_ikan3);
            $this->db->set('waktu_vitamin_ikan', $waktu_vitamin_ikan);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('historydevice/control');
        }
    }

    function datagrafik()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->limit(1)->get()->result(); //Untuk mengambil data dari database webinar

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/list3', $data);
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

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/suhutanaman', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function co2tanaman()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/co2tanaman', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function o2tanaman()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/o2tanaman', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function discharge()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/discharge', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function ph()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/ph', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function phakuarium()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/phakuarium', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function suhuakuarium()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/suhuakuarium', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function oxygen()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/oxygen', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function ammonia()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/ammonia', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function lightintensity()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/lightintensity', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function moisture()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/moisture', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function minerals()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $data['data2'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit(1)->get()->result();

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/minerals', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function datasensor()
    {
        $data['data'] = $this->db->select('*')->from('datasensor')->where('id_user', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $datas['title'] = 'Monitoring Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/list2', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai       
    }

    function fuzzy()
    {
        $datas['title'] = 'Monitoring Device';
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

        // $data['data_2'] = $this->db->select('*')->from('bayesprediction')->get()->result(); //Untuk mengambil data dari database webinar

        //   $data['data'] = $this->db->select('*')->from('datasensor')->get()->result(); //Untuk mengambil data dari database webinar
        //$data['rule'] = $this->db->select('*')->from('fuzzyrule_suhu_tanaman')->get()->result(); //Untuk mengambil data dari database webinar
        $data['datax'] = $this->db->select('*')->from('datasensor')->order_by('id', 'DESC')->limit(1)->get()->result(); //menapilkan data gauge

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'historydevice/fuzzy', $data);
    }


    function add()
    {
        $isi = array(
            'akuaponik'     => $this->input->post('akuaponik'),
            'akuarium'     => $this->input->post('akuarium'),
            'hasil'     => $this->input->post('hasil'),

        );
        $this->db->insert('bayesprediction', $isi);
        redirect('historydevice');
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            // proses delete data
            $this->db->where('id', $id);
            $this->db->delete('bayesprediction');
        }
        redirect('historydevice');
    }

    function fuzzyrule()
    {
        $datas['title'] = 'Monitoring Device';
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
        $this->template->load('template1', 'historydevice/fuzzyrule', $data);
    }

    function edit()
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
            redirect('historydevice');
        }
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
            $this->db->update('fuzzyrule_phtanaman', $data);
            redirect('historydevice');
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
            redirect('historydevice');
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
            redirect('historydevice');
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
            redirect('historydevice');
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
            redirect('historydevice');
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
            redirect('historydevice');
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
            redirect('historydevice');
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
            redirect('historydevice');
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
            redirect('historydevice');
        }
    }
}
