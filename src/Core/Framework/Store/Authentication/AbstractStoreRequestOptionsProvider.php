<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Store\Authentication;

use Shopware\Core\Framework\Api\Context\AdminApiSource;
use Shopware\Core\Framework\Api\Context\Exception\InvalidContextSourceException;
use Shopware\Core\Framework\Context;

/**
 * @package merchant-services
 *
 * @deprecated tag:v6.5.0 - reason:becomes-internal
 */
abstract class AbstractStoreRequestOptionsProvider
{
    /**
     * @return array<string, string>
     */
    abstract public function getAuthenticationHeader(Context $context): array;

    /**
     * @deprecated tag:v6.5.0 - parameter $language will be removed and $context must not be null in the future
     *
     * @return array<string, string>
     */
    abstract public function getDefaultQueryParameters(?Context $context, ?string $language = null): array;

    protected function ensureAdminApiSource(Context $context): AdminApiSource
    {
        $contextSource = $context->getSource();
        if (!($contextSource instanceof AdminApiSource)) {
            throw new InvalidContextSourceException(AdminApiSource::class, \get_class($contextSource));
        }

        return $contextSource;
    }
}
