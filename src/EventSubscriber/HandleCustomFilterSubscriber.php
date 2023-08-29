<?php declare(strict_types=1);

namespace SwagTraining\CustomFilter\EventSubscriber;

use Shopware\Core\Content\Product\Events\ProductListingCollectFilterEvent;
use Shopware\Core\Content\Product\SalesChannel\Listing\Filter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class HandleCustomFilterSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ProductListingCollectFilterEvent::class => 'addFilter',
        ];
    }

    public function addFilter(ProductListingCollectFilterEvent $event)
    {
        $filters = $event->getFilters();
        $request = $event->getRequest();
        $filtered = (bool) $request->get('foobar');

        $filter = new Filter(
            'foobar',
            $filtered,
            [],
            new EqualsFilter('product.customFields.custom_product_foobar', true),
            $filtered
        );

        $filters->add($filter);
    }
}