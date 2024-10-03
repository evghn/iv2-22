<?php

class Assist
{
    public static function construct(object $obj, array $data): void
    {
        foreach ($data as $field => $val) {
            if (isset($obj->$field)) {
                $obj->$field = $val;
            }            
        }
    }

    public static function getInfo(object $obj, bool $toString = false, ?array $data = null): array|string
    {
        $data = $data ?? get_object_vars($obj);
        return $toString 
                ? implode(
                    array_map(
                        fn($val, $key) => "<div>$key => $val</div>",
                        $data,
                        array_keys($data),
                    )
                )
                : $data;
    }


    public static function getParam(object $obj, string $param, bool $toString = false): array|string|null
    {
        return isset($obj->$param)
                    ? self::getInfo($obj, $toString, [$param => $obj->$param])                    
                    : null;
    }
}
