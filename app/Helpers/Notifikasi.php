<?php
use App\Models\User;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\SendMailNotif;
use Illuminate\Support\Facades\Mail;

if (! function_exists('kirimNotif')) {
    function kirimNotif($fk_data,$role,$judul,$link,$pesan,$fk_tujuan,$email_tujuan=null)
    {
        $kirimemail = true;
        $data['fk_data'] = $fk_data;
        $data['role'] = $role;
        $data['judul'] = $judul;
        $data['link'] = $link;
        $data['pesan'] = $pesan;
        $data['fk_tujuan'] = $fk_tujuan;
        $data['email_tujuan'] = $email_tujuan;
        $data['created_by'] = Auth::id() ? Auth::id() : 0;
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id() ? Auth::id() : 0;
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $createNotif = Notifikasi::create($data);
        if($createNotif){
            if($role=="pengusaha"){
                if($email_tujuan){
                    $data_email = [
                        'email' => $email_tujuan,
                        'judul' => $judul,
                        'pesan' => $pesan,
                        'link' => url('notifikasi/ubahstatus')."/".$createNotif->id."?link=".$link,
                    ];
                    $mail = new SendMailNotif($data_email);
                    if($kirimemail){
                        Mail::to($email_tujuan)->send($mail);
                    }
                }
            }elseif($role=="sudin"){
                $getUserSudin = User::where('role','sudin')->where('fk_lokasi_sudin',$fk_tujuan)->pluck('email')->all();
                foreach($getUserSudin as $keyEmail){
                    if($keyEmail){
                        $data_email = [
                            'email' => $keyEmail,
                            'judul' => $judul,
                            'pesan' => $pesan,
                            'link' => url('notifikasi/ubahstatus')."/".$createNotif->id."?link=".$link,
                        ];
                        $mail = new SendMailNotif($data_email);
                        if($kirimemail){
                            Mail::to($keyEmail)->send($mail);
                        }
                    }
                }
            }elseif($role=="dinas"){
                $getUserDinas = User::where('role','dinas')->pluck('email')->all();
                foreach($getUserDinas as $keyEmail){
                    if($keyEmail){
                        $data_email = [
                            'email' => $keyEmail,
                            'judul' => $judul,
                            'pesan' => $pesan,
                            'link' => url('notifikasi/ubahstatus')."/".$createNotif->id."?link=".$link,
                        ];
                        $mail = new SendMailNotif($data_email);
                        if($kirimemail){
                            Mail::to($keyEmail)->send($mail);
                        }
                    }
                }
            }
            return true;
        }else{
            return false;
        }
    }
}

if (! function_exists('cekNotif')) {
    function cekNotif()
    {
        $cekNotif = [];
        if(Auth::user()->role=="pengusaha"){
            $cekNotif = Notifikasi::where('status',0)->where('role','pengusaha')->where('fk_tujuan',Auth::user()->id)->orderBy('created_at','desc')->get();
        }elseif(Auth::user()->role=="sudin"){
            $cekNotif = Notifikasi::where('status',0)->where('role','sudin')->where('fk_tujuan',Auth::user()->fk_lokasi_sudin)->orderBy('created_at','desc')->get();
        }elseif(Auth::user()->role=="dinas"){
            $cekNotif = Notifikasi::where('status',0)->where('role','dinas')->orderBy('created_at','desc')->get();
        }
        return $cekNotif;
    }
}