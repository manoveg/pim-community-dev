<?php

namespace Context\Page\Category;

use Context\Page\Base\Form;
use Pim\Bundle\ProductBundle\Entity\Category;

/**
 * Category tree edit page
 *
 * @author    Gildas Quemener <gildas.quemener@gmail.com>
 * @copyright 2013 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Edit extends Form
{
    protected $path = '/enrich/category-tree/edit/{id}';

    /**
     * Return the url of the current page
     * @param Category $category
     *
     * @return string
     */
    public function getUrl(Category $category)
    {
        return str_replace('{id}', $category->getId(), $this->getPath());
    }
}