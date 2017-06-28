<?php

declare(strict_types=1);

namespace Moon\Core;

use Moon\Core\Collection\HttpPipelineArrayCollection;
use Moon\Core\Collection\HttpPipelineCollectionInterface;
use Moon\Core\Pipeline\HttpPipeline;

class Router
{
    /**
     * @var HttpPipeline[] $httpPipelines
     */
    protected $httpPipelines = [];

    /**
     * Add a 'GET' route to be handled by the application
     *
     * @param string $pattern
     * @param array $stages
     *
     * @return void
     */
    public function get(string $pattern, array $stages): void
    {
        $this->httpPipelines[] = new HttpPipeline('GET', $pattern, $stages);
    }

    /**
     * Add a 'POST' route to be handled by the application
     *
     * @param string $pattern
     * @param array $stages
     *
     * @return void
     */
    public function post(string $pattern, array $stages): void
    {
        $this->httpPipelines[] = new HttpPipeline('POST', $pattern, $stages);
    }

    /**
     * Add a 'PUT' route to be handled by the application
     *
     * @param string $pattern
     * @param array $stages
     *
     * @return void
     */
    public function put(string $pattern, array $stages): void
    {
        $this->httpPipelines[] = new HttpPipeline('PUT', $pattern, $stages);
    }

    /**
     * Add a 'PATCH' route to be handled by the application
     *
     * @param string $pattern
     * @param array $stages
     *
     * @return void
     */
    public function patch(string $pattern, array $stages): void
    {
        $this->httpPipelines[] = new HttpPipeline('PATCH', $pattern, $stages);
    }

    /**
     * Add a 'DELETE' route to be handled by the application
     *
     * @param string $pattern
     * @param array $stages
     *
     * @return void
     */
    public function delete(string $pattern, array $stages): void
    {
        $this->httpPipelines[] = new HttpPipeline('DELETE', $pattern, $stages);
    }

    /**
     * Add a 'OPTIONS' route to be handled by the application
     *
     * @param string $pattern
     * @param array $stages
     *
     * @return void
     */
    public function options(string $pattern, array $stages): void
    {
        $this->httpPipelines[] = new HttpPipeline('OPTIONS', $pattern, $stages);
    }

    /**
     * Add a 'HEAD' route to be handled by the application
     *
     * @param string $pattern
     * @param array $stages
     *
     * @return void
     */
    public function head(string $pattern, array $stages): void
    {
        $this->httpPipelines[] = new HttpPipeline('HEAD', $pattern, $stages);
    }

    /**
     * Return all pipelines generated by the router
     *
     * @return HttpPipelineCollectionInterface
     */
    public function pipelines(): HttpPipelineCollectionInterface
    {
        return new HttpPipelineArrayCollection($this->httpPipelines);
    }
}