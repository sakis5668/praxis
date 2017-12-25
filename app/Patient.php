<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'birth_date',
        'email', 'mobile_number', 'phone_number', 'address', 'information',
        'physician_id'
    ];

    protected $dates = ['birth_date'];

    private $starting_path = '/docs/patients';

    public function physician()
    {
        return $this->belongsTo(Physician::class);
    }

    public function history()
    {
        return $this->hasOne(History::class);
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }

    public function examinationsOrderByDateDesc()
    {
        return $this->hasMany(Examination::class)->orderBy('date', 'desc');
    }

    public function cytologies()
    {
        return $this->hasMany(Cytology::class)->orderBy('date', 'desc');
    }

    public function histologies()
    {
        return $this->hasMany(Histology::class)->orderBy('date', 'desc');
    }

    public function laboratoryExaminations()
    {
        return $this->hasMany(LaboratoryExamination::class)->orderBy('date', 'desc');
    }

    public function imagingResults()
    {
        return $this->hasMany(ImagingResult::class)->orderBy('date', 'desc');
    }

    public function surgeries()
    {
        return $this->hasMany(Surgery::class)->orderBy('date', 'desc');
    }

    public function pregnancies()
    {
        return $this->hasMany(Pregnancy::class)->orderBy('edd');
    }



    public function getPatientPath()
    {
        //$tmp = public_path() . '/docs';
        $tmp = public_path() . $this->starting_path;
        $first_capital = mb_substr($this->last_name, 0, 1);
        if ($this->uniord($first_capital) < 256) {
            $language = 'latin';
        } else {
            $language = 'greek';
        }
        $dirname = $this->last_name . ' ' . $this->first_name . ' (' . $this->id . ')';
        $path_to_store = $tmp . '/' . $language . '/' . $first_capital . '/' . $dirname;
        return $path_to_store;
    }

    public function getShortPatientPath()
    {
        //$tmp = '/docs';
        $tmp = $this->starting_path;
        $first_capital = mb_substr($this->last_name, 0, 1);
        if ($this->uniord($first_capital) < 256) {
            $language = 'latin';
        } else {
            $language = 'greek';
        }
        $dirname = $this->last_name . ' ' . $this->first_name . ' (' . $this->id . ')';
        $path_to_store = $tmp . '/' . $language . '/' . $first_capital . '/' . $dirname;
        return $path_to_store;
    }

    public function getUrlPatientPath()
    {
        return url('/') . $this->getShortPatientPath();
    }

    private function recursiveRemoveDirectory($directory)
    {
        if (!is_dir($directory)) {
            throw new InvalidArgumentException("$directory must be a directory");
        }
        if (mb_substr($directory, mb_strlen($directory) - 1, 1) != '/') {
            $directory .= '/';
        }
        $files = glob($directory . "*");
        if (!empty($files)) {
            foreach ($files as $file) {
                if (is_dir($file)) {
                    $this->recursiveRemoveDirectory($file);
                } else {
                    unlink($file);
                }
            }
        }
        rmdir($directory);
    } // END recursiveRemoveDirectory()

    public function removePatientPath()
    {
        $this->recursiveRemoveDirectory($this->getPatientPath());
    }

    /*
     * need this for the function above, because
     * ord() does not work with utf-8
     */
    private function uniord($u)
    {
        $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
        $k1 = ord(substr($k, 0, 1));
        $k2 = ord(substr($k, 1, 1));
        return $k2 * 256 + $k1;
    }
}
