<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Swissup\SearchMysqlLegacy\Model\Search;

use Magento\Framework\Data\Collection;

/**
 * Search collection provider.
 */
interface ItemCollectionProviderInterface
{
    /**
     * Get collection.
     *
     * @return Collection
     */
    public function getCollection() : Collection;
}
