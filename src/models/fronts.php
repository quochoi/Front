<?php

namespace Foostart\Front\Models;

use Illuminate\Database\Eloquent\Model;

class Fronts extends Model {

    protected $table = 'fronts';
    public $timestamps = false;
    protected $fillable = [
        'front_name'
    ];
    protected $primaryKey = 'front_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_fronts($params = array()) {
        $eloquent = self::orderBy('front_id');

        //front_name
        if (!empty($params['front_name'])) {
            $eloquent->where('front_name', 'like', '%'. $params['front_name'].'%');
        }

        $fronts = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $fronts;
    }



    /**
     *
     * @param type $input
     * @param type $front_id
     * @return type
     */
    public function update_front($input, $front_id = NULL) {

        if (empty($front_id)) {
            $front_id = $input['front_id'];
        }

        $front = self::find($front_id);

        if (!empty($front)) {

            $front->front_name = $input['front_name'];

            $front->save();

            return $front;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_front($input) {

        $front = self::create([
                    'front_name' => $input['front_name'],
        ]);
        return $front;
    }
}
