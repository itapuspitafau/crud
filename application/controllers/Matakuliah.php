<?php
class Matakuliah extends CI_Controller
{
    
    public function index()
    {
        $data['matkul']=$this->M_matakuliah->TampilMatakuliah()->result();
        $this->load->view('view_form_matakuliah', $data);
    
    }
    
    public function cetak()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s Kode minimal 3 karakter.'
        ));
           
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s kode minimal 3.'
        ));

        $this->form_validation->set_rules('sks', 'sks', 'required',
        array(
            'required'      => '%s Wajib dipilih.'
        ));

        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('view_form_matakuliah');
                }
                else
                {
                    $data = [
                        'kode' => $this->input->post('kode'),
                        'nama' => $this->input->post('nama'),
                        'sks' => $this->input->post('sks')
                    ];

                    $this->M_matakuliah->SimpanMatakuliah($data);
                    redirect('Matakuliah/index/');
                }
    }

    public function hapus(){
    $where=['kode'=>$this->uri->segment(3)];
    $this->M_matakuliah->hapusMatakuliah($where);
    redirect('Matakuliah/index');
    }
    public function edit(){
        $matkul=$this->M_matakuliah->matkulWhere(['kode'=>$this->uri->segment(3)])->result_array();
        $data=array(
            "kode"=>$matkul[0]['kode'],
            "nama"=>$matkul[0]['nama'],
            "sks"=>$matkul[0]['sks'],
        );
        $this->load->view('view_edit_matakuliah', $data);
    }
public function update(){

    $this->form_validation->set_rules('kode', 'Kode', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s Kode minimal 3 karakter.'
        ));
           
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s kode minimal 3.'
        ));

        $this->form_validation->set_rules('sks', 'sks', 'required',
        array(
            'required'      => '%s Wajib dipilih.'
        ));

        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('view_edit_matakuliah');
                }
                else
                {
                    $data = [
                        'kode' => $this->input->post('kode'),
                        'nama' => $this->input->post('nama'),
                        'sks' => $this->input->post('sks')
                    ];

                    $this->M_matakuliah->updateMatakuliah($data,['kode'=>$this->input->post('kode')]);
                    redirect('Matakuliah');
                }
}
}