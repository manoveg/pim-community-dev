<?php

namespace Pim\Bundle\CatalogBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use Pim\Bundle\CatalogBundle\Model\ProductInterface;
use Pim\Bundle\CatalogBundle\Model\CategoryInterface;

/**
 * Product category repository interface
 *
 * @author    Nicolas Dupont <nicolas@akeneo.com>
 * @copyright 2014 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface ProductCategoryRepositoryInterface
{
    /**
     * Return the number of times the product is present in each tree
     *
     * @param ProductInterface $product The product to look for in the trees
     *
     * @return array Each row of the array has the format:'tree'=>treeObject, 'productCount'=>integer
     */
    public function getProductCountByTree(ProductInterface $product);

    /**
     * Get product ids linked to a category or its children.
     * You can define if you just want to get the property of the actual node or with its children with the direct
     * parameter
     *
     * @param CategoryInterface $category   the requested node
     * @param QueryBuilder      $categoryQb category query buider
     *
     * @return array
     */
    public function getProductIdsInCategory(CategoryInterface $category, QueryBuilder $categoryQb = null);

    /**
     * Count products linked to a node.
     * You can define if you just want to get the property of the actual node
     * or with its children with the direct parameter
     * The third parameter allow to include the actual node or not
     *
     * @param CategoryInterface $category   the requested category node
     * @param QueryBuilder      $categoryQb category query buider
     *
     * @return integer
     */
    public function getProductsCountInCategory(CategoryInterface $category, QueryBuilder $categoryQb = null);

    /**
     * Apply a filter by product ids
     *
     * @param mixed   $qb         query builder to update
     * @param array   $productIds product ids
     * @param boolean $include    true for in, false for not in
     */
    public function applyFilterByIds($qb, array $productIds, $include);
}
