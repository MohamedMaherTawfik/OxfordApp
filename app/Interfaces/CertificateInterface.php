<?php

namespace App\Interfaces;

interface CertificateInterface
{
    public function getCertificates($id);
    public function getCertificate($id);
    public function storeCertificate(array $data,$id);
    public function updateCertificate(array $data,$id);
    public function deleteCertificate($id);
}
