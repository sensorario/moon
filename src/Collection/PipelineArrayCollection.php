<?php

declare(strict_types=1);

namespace Moon\Core\Collection;

use Moon\Core\Exception\InvalidArgumentException;
use Moon\Core\Pipeline\PipelineInterface;

class PipelineArrayCollection implements PipelineCollectionInterface
{
    /**
     * @var array $pipelines
     */
    protected $pipelines;

    /**
     * PipelineArrayCollection constructor.
     *
     * @param array $pipelines
     *
     * @throws \Moon\Core\Exception\InvalidArgumentException
     */
    public function __construct(array $pipelines = [])
    {
        foreach ($pipelines as $key => $pipeline) {
            if (!$pipeline instanceof PipelineInterface) {
                throw new InvalidArgumentException('All pipelines must implement ' . PipelineInterface::class);
            }
        }

        $this->pipelines = $pipelines;
    }

    /**
     * {@inheritdoc}
     */
    public function add(PipelineInterface $pipeline): void
    {
        $this->pipelines[] = $pipeline;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Moon\Core\Exception\InvalidArgumentException
     */
    public function addArray(array $pipelines): void
    {
        foreach ($pipelines as $key => $pipeline) {
            if (!$pipeline instanceof PipelineInterface) {
                throw new InvalidArgumentException('All pipelines must implement ' . PipelineInterface::class);
            }
        }

        $this->pipelines = array_merge($this->pipelines, $pipelines);
    }

    /**
     * {@inheritdoc}
     */
    public function merge(PipelineCollectionInterface $pipelineCollection): void
    {
        $this->pipelines = array_merge($this->pipelines, $pipelineCollection->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return $this->pipelines;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): \Generator
    {
        foreach ($this->pipelines as $key => $pipeline) {
            yield $key => $pipeline;
        }
    }
}