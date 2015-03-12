<?php

namespace Boom\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $_table_columns = [
        'id'            =>    '',
        'name'        =>    '',
        'slug_short'    =>    '',
        'slug_long'        =>    '',
        'group' => '',
    ];

    protected $table = 'tags';

    public function check_slugs_are_defined()
    {
        if (! $this->slug_short) {
            $this->slug_short = $this->create_short_slug($this->name);
        }
    }

    public function create(Validation $validation = null)
    {
        $this->check_slugs_are_defined();

        return parent::create($validation);
    }

    public function create_short_slug($name)
    {
        $name = preg_replace('|.*/|', '', $name);

        return \URL::title($name);
    }

    public function filters()
    {
        return [
            'name' => [
                ['trim'],
            ],
        ];
    }

    /**
	 * ORM Validation rules
	 *
	 * @link http://kohanaframework.org/3.2/guide/orm/examples/validation
	 */
    public function rules()
    {
        return [
            'name' => [
                ['not_empty'],
                ['max_length', [':value', 255]],
            ],
        ];
    }

    public function update(Validation $validation = null)
    {
        $this->check_slugs_are_defined();

        return parent::update($validation);
    }
}