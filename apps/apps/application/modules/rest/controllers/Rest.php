<?php

class Rest extends MX_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function datasensor()
  {
    $id_user = $this->db->select('*')->from('user')->where('HWID', $_GET['HWID'])->where('token', $_GET['token'])->get()->row()->id;
    $isi = array(

      'id_user'     => $id_user,
      'HWID'     => $_GET['HWID'],
      'suhu_tanaman'     => $_GET['suhu_tanaman'],
      'PH_tanaman'     => $_GET['PH_tanaman'],
      'intentitascahaya_tanaman'     => $_GET['intentitascahaya_tanaman'],
      'intentitascahaya_tanaman2'     => $_GET['intentitascahaya_tanaman2'],
      'kelembapan_tanaman'     => $_GET['kelembapan_tanaman'],
      'kelembapan_tanaman2'     => $_GET['kelembapan_tanaman2'],
      'co2_tanaman'     => $_GET['co2_tanaman'],
      'o2_tanaman'     => $_GET['o2_tanaman'],
      'debit_tanaman'     => $_GET['debit_tanaman'],
      'mineral_tanaman'     => $_GET['mineral_tanaman'],
      'mineral_tanaman2'     => $_GET['mineral_tanaman2'],
      'indikatornutrisi_tanaman'     => $_GET['indikatornutrisi_tanaman'],
      'PH_akuarium'     => $_GET['PH_akuarium'],
      'suhu_akuarium'     => $_GET['suhu_akuarium'],
      'oksigen_akuarium'     => $_GET['oksigen_akuarium'],
      'amoniak_akuarium'     => $_GET['amoniak_akuarium'],
      'indikatorpakan_akuarium'     => $_GET['indikatorpakan_akuarium'],
      'indikatorvitamin_akuarium'     => $_GET['indikatorvitamin_akuarium'],

    );
    $this->db->insert('datasensor', $isi);
  }
  
  public function dataapijson(){
$id = $_GET['HWID'];
$data = $this->db->select('*')->from('user')->where('HWID',$id)->limit(1)->order_by('id','desc')->get()->result();
foreach ($data as $country) 
    {
  $jam_jadwal_pupuk =   $country->jadwal_pupuk;
  $jam_waktu_pakan_ikan = $country->waktu_pakan_ikan;
  $jam_waktu_pakan_ikan2 = $country->waktu_pakan_ikan2;
  $jam_waktu_pakan_ikan3 = $country->waktu_pakan_ikan3;
  $jam_waktu_vitamin_ikan = $country->waktu_vitamin_ikan;
  $jamkini = date("l:H:i");
  $jamkini2 = date("H:i");
    }
  $response = array();
  $posts = array();
  if ($jam_jadwal_pupuk == $jamkini){
    $posts = array(
            "jadwal_pupuk"   =>  1,
            "waktu_vitamin_ikan"   =>  0,
            "waktu_pakan_ikan"   =>  0
        );
  } else if ($jam_waktu_vitamin_ikan == $jamkini) {
    $posts = array(
            "jadwal_pupuk"   =>  0,
            "waktu_vitamin_ikan"   =>  1,
            "waktu_pakan_ikan"   =>  0
        );
  } else if ($jam_waktu_pakan_ikan == $jamkini2 || $jam_waktu_pakan_ikan2 == $jamkini2 || $jam_waktu_pakan_ikan3 == $jamkini2){
      $posts = array(
      "jadwal_pupuk"   =>  0,
      "waktu_vitamin_ikan"   =>  0,
      "waktu_pakan_ikan"   =>  1
      );
  } else{
            $posts = array(
      "jadwal_pupuk"   =>  0,
      "waktu_vitamin_ikan"   =>  0,
      "waktu_pakan_ikan"   =>  0
      );
  }
 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}


  public function getSuhuAkuarium(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('suhu_akuarium')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}

  public function getPhAkuarium(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('ph_akuarium')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}

  public function getOksigenAkuarium(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('oksigen_akuarium')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}

  public function getKelembapanTanaman(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('kelembapan_tanaman')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}

  public function getFuzzyrulePhtanaman(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('fuzzyrule_phtanaman')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}

  public function getFuzzyruleIntentitascahayatanaman2(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('fuzzyrule_intentitascahaya_tanaman2')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}


  public function getFuzzyrule(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('fuzzyrule')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}


  public function getCo2Tanaman(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('co2_tanaman')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}

  public function getAmoniakAkuarium(){
$id = $_GET['id_user'];	
$data = $this->db->select('*')->from('amoniak_akuarium')->where('id_user',$id)->limit(1)->order_by('id','desc')->get()->result();
$response = array();
    $posts = array();
    foreach ($data as $country) 
    { 
        $posts = array(
            "min"                 =>  floatval($country->min),
            "mid"   =>  floatval($country->mid),
            "max"   =>  floatval($country->max)
        );
    } 
    $response['posts'] = $posts;
    echo json_encode($posts,TRUE);
}

}
