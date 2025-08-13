<?php

namespace App\Enums;

enum PublishedStatus: string
{
    // Yayınlandı
    case PUBLISHED = 'published';

    // Taslakta
    case DRAFT = 'draft';

    // Silindi
    case DELETED = 'deleted';

    // Onay sürecinden geçmemiş
    case REJECTED = 'rejected';

    // Yayın öncesi onay bekliyor
    case PENDING_REVIEW = 'pending_review';

    // Gizlenmiş
    case HIDDEN = 'hidden';

    // Herkese Açık
    case PUBLIC = 'public';

    public function label(): string
    {
        return match ($this) {
            self::PUBLISHED => __('Yayınlandı'),
            self::DRAFT => __('Taslakta'),
            self::DELETED => __('Silindi'),
            self::REJECTED => __('Onay sürecinden geçmemiş'),
            self::PENDING_REVIEW => __('Yayın öncesi onay bekliyor'),
            self::HIDDEN => __('Gizli'),
            self::PUBLIC => __('Herkese açık')
        };
    }
}
