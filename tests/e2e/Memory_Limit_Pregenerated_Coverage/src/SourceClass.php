<?php

namespace MemoryLimit;

class SourceClass
{
    public function count(): int
    {
        if (ini_get('memory_limit') !== '-1') {
            return 0;
        }

        $result = [];

        $condition = false;

        do {
            // Generate 64MB of random data
            $result[] = random_bytes(64 * 1024 * 1024);
        } while ($condition);

        if ($condition && memory_get_usage(true) < 3 * 64 * 1024 * 1024) {
            throw new \LogicException('$condition was mutated to true but memory usage has not increased');
        }

        // Do something with the generated result-data to prevent it possibly being optimized away by the interpreter
        return strlen($result[\random_int(0, count($result) - 1)]) === 67108864 ? 1 : 0;
    }
}
