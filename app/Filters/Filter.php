<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    protected $filters = [];

    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Builder
     */
    protected $query;

    /**
     * ItemFilters constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $query
     *
     * @return mixed
     */
    public function apply($query)
    {
        $this->query = $query;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->query;
    }

    protected function getFilters()
    {
        return $this->request->only($this->filters);
    }
}
