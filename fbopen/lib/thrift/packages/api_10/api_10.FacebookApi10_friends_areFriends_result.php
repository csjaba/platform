<?php
class api10_FacebookApi10_friends_areFriends_result {
  public $success = null;
  public $error_response = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['error_response'])) {
        $this->error_response = $vals['error_response'];
      }
    }
  }

  public function getName() {
    return 'FacebookApi10_friends_areFriends_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::LST) {
            if (($input instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists('thrift_protocol_binary_deserialize'))
            {
              $this->success = thrift_protocol_binary_deserialize(TType::LST, $input, 'friend_info');
            }
            else
            {
              $this->success = array();
              $_size56 = 0;
              $_etype59 = 0;
              $xfer += $input->readListBegin($_etype59, $_size56);
              for ($_i60 = 0; $_i60 < $_size56; ++$_i60)
              {
                $elem61 = null;
                $elem61 = new api10_friend_info();
                $xfer += $elem61->read($input);
                $this->success []= $elem61;
              }
              $xfer += $input->readListEnd();
            }
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->error_response = new api10_FacebookApiException();
            $xfer += $this->error_response->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('FacebookApi10_friends_areFriends_result');
    if ($this->success !== null) {
      $xfer += $output->writeFieldBegin('success', TType::LST, 0);
      {
        $output->writeListBegin(TType::STRUCT, count($this->success));
        {
          foreach ($this->success as $iter62)
          {
            $xfer += $iter62->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->error_response !== null) {
      $xfer += $output->writeFieldBegin('error_response', TType::STRUCT, 1);
      $xfer += $this->error_response->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


?>
