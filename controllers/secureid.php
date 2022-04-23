    public function dec_secure($cipher){
        $encrypter = service('encrypter');
        $cipher=str_replace(array('-', '_', '~'), array('+', '/', '='), $cipher);
        $cipher=base64_decode($cipher);
        $cipher=$encrypter->decrypt($cipher);
        $pieces = explode("/", $cipher);
        if($pieces[1] == $this->session->get('sm_id')){
            $cipher = $pieces[0];
        }else{
            echo 'BASECONTROLLER: SECURE ENCRYPTION ERROR'; exit;
        }
        return $cipher;
    }    

    public function enc_secure($string){
        $encrypter = service('encrypter');
        $sm_id = $this->session->get('sm_id');
        $cipher = base64_encode($encrypter->encrypt($string.'/'.$sm_id));
        return str_replace(array('+', '/', '='), array('-', '_', '~'), $cipher);
    }

    public function add_secure_id($dataInArray, $field_id, $field_secure = 'enc_id'){
        $result = array_map(function ($arr){
            $arr[$field_secure] = $this->enc_secure($arr[$field_id]);
            return $arr;
        },$dataInArray);

        return $result;
    }

//tambah encryption id
        $data = $this->model->getAllDataArray($this->limit, $this->getOffset($page), $filter);
        $data = array_map(function ($arr){
            $arr['secure_id'] = $this->enc_secure($arr['mykid']);
            return $arr;
        },$data);


