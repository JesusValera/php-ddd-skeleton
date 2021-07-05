<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\CoursesCounter\Infrastructure\Persistence\Doctrine;

use CodelyTv\Mooc\Shared\Domain\Course\CourseUuid;
use CodelyTv\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;

use function Lambdish\Phunctional\map;

final class CourseUuidsType extends JsonType implements DoctrineCustomType
{
    public static function customTypeName(): string
    {
        return 'course_ids';
    }

    public function getName(): string
    {
        return self::customTypeName();
    }

    /**
     * @var CourseUuid[] $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return parent::convertToDatabaseValue(map($this->values(), $value), $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $scalars = parent::convertToPHPValue($value, $platform);

        return map($this->toCourseId(), $scalars);
    }

    private function values()
    {
        return static function (CourseUuid $id) {
            return $id->value();
        };
    }

    private function toCourseId()
    {
        return static function (string $value) {
            return new CourseUuid($value);
        };
    }
}
