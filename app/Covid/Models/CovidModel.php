<?php

namespace App\Covid\Models;

use Illuminate\Database\Eloquent\Model;

/**
* CovidModel
*/
class CovidModel extends Model
{
    /**
     * @var string $table
     */
	protected $table = 'covid_observations';

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'sno';

    /**
     * @var array $fillable
     */
    protected $fillable = ['sno', 'observation_date', 'state', 'country', 'last_updated', 'confirmed', 'deaths', 'recovered'];
}
