<?php

namespace Pim\Bundle\ExtendedAttributeTypeBundle\Normalizer\Flat;

use Pim\Bundle\ExtendedAttributeTypeBundle\Model\RangeInterface;
use Pim\Bundle\TransformBundle\Normalizer\Flat\AbstractProductValueDataNormalizer;

/**
 * Normalizes Range attribute type to a flat format for exports in CSV and saving
 * product versions as CSV.
 *
 * @author Romain Monceau <romain@akeneo.com>
 */
class RangeNormalizer extends AbstractProductValueDataNormalizer
{
    /** @var string[] */
    protected $supportedFormats = ['csv', 'flat'];

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof RangeInterface && in_array($format, $this->supportedFormats);
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            $this->getFieldName($object, $context) .'-min' => $object->getFromData(),
            $this->getFieldName($object, $context) .'-max'   => $object->getToData(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function doNormalize($object, $format = null, array $context = array())
    {
    }
}
