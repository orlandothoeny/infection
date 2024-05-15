use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
#[Group('integration')]
#[CoversClass(DiffChangedLinesParser::class)]
    #[DataProvider('provideDiffs')]
                diff --git a/src/Container.php b/src/Container.php
                @@ -37,0 +38 @@ namespace Infection;
                @@ -533 +534,2 @@ final class Container
                @@ -535,0 +538,3 @@ final class Container
                @@ -1207,0 +1213,5 @@ final class Container
                DIFF,
                diff --git a/src/Container.php b/src/Container.php
                @@ -37,0 +38 @@ namespace Infection;
                @@ -533 +534,2 @@ final class Container
                @@ -535,0 +538,3 @@ final class Container
                @@ -1207,0 +1213,5 @@ final class Container
                diff --git a/src/Differ/FilesDiffChangedLines.php b/src/Differ/FilesDiffChangedLines.php
                new file mode 100644
                @@ -0,0 +1,18 @@
                DIFF,
                static fn (ChangedLinesRange $changedLinesRange): array => [$changedLinesRange->getStartLine(), $changedLinesRange->getEndLine()],