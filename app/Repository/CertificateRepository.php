<?php

namespace App\Repository;

use App\Interfaces\CertificateInterface;
use App\Models\Certificate;

class CertificateRepository implements CertificateInterface
{
    public function getCertificates($id)
    {
        return Certificate::where('courses_id', $id)->get();
    }

    public function getCertificate($id)
    {
        return Certificate::find($id);
    }
    public function storeCertificate($data,$id)
    {
        $data= Certificate::create([
            'certificate' => $data['certificate'],
            'courses_id' => $id,
            'user_id' => auth()->user()->id
        ]);
    }

    public function updateCertificate($id, $data)
    {
        $certificate = Certificate::find($id);
        $certificate->update($data);
        return $certificate;
    }

    public function deleteCertificate($id)
    {
        $certificate = Certificate::find($id);
        $certificate->delete();
        return $certificate;
    }

}
