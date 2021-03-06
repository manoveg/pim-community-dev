<?php

namespace spec\Pim\Bundle\CatalogBundle\MongoDB\Normalizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Pim\Bundle\CatalogBundle\Model\ProductPrice;

class ProductPriceNormalizerSpec extends ObjectBehavior
{
    function it_is_a_normalizer()
    {
        $this->shouldImplement('Symfony\Component\Serializer\Normalizer\NormalizerInterface');
    }

    function it_supports_normalization_in_mongodb_json_of_price(ProductPrice $price)
    {
        $this->supportsNormalization($price, 'mongodb_json')->shouldBe(true);
        $this->supportsNormalization($price, 'json')->shouldBe(false);
        $this->supportsNormalization($price, 'xml')->shouldBe(false);
    }

    function it_normalizes_price(ProductPrice $price)
    {
        $price->getData()->willReturn('12.75');
        $price->getCurrency()->willReturn('EUR');

        $this->normalize($price, 'mongodb_json', [])->shouldReturn(['EUR' => ['data' => '12.75', 'currency' => 'EUR']]);
    }
}
