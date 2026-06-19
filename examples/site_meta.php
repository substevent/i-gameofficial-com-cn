<?php
/**
 * Site Metadata: Provides an array of site metadata and a method to generate a concise description.
 */

class SiteMeta {
    private array $metaData;

    public function __construct() {
        $this->metaData = [
            'site_name' => '爱游戏官方',
            'site_url' => 'https://i-gameofficial.com.cn',
            'keywords' => ['爱游戏', '游戏', '娱乐'],
            'description' => '爱游戏官方平台 - 提供最新游戏资讯与服务',
            'author' => '爱游戏团队',
            'language' => 'zh-CN',
            'charset' => 'UTF-8'
        ];
    }

    /**
     * Get the full metadata array.
     */
    public function getMetaData(): array {
        return $this->metaData;
    }

    /**
     * Generate a short description text using core keywords and site URL.
     */
    public function generateShortDescription(): string {
        $name = htmlspecialchars($this->metaData['site_name'], ENT_QUOTES, 'UTF-8');
        $url = htmlspecialchars($this->metaData['site_url'], ENT_QUOTES, 'UTF-8');
        $desc = htmlspecialchars($this->metaData['description'], ENT_QUOTES, 'UTF-8');
        return "欢迎访问 {$name}（{$url}）—— {$desc}";
    }

    /**
     * Output HTML meta tags as string (safe).
     */
    public function renderMetaTags(): string {
        $tags = '';
        $tags .= '<meta charset="' . htmlspecialchars($this->metaData['charset'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
        $tags .= '<meta name="description" content="' . htmlspecialchars($this->metaData['description'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
        $tags .= '<meta name="keywords" content="' . htmlspecialchars(implode(', ', $this->metaData['keywords']), ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
        $tags .= '<meta name="author" content="' . htmlspecialchars($this->metaData['author'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
        return $tags;
    }
}

// Example usage (can be removed or kept for testing)
$meta = new SiteMeta();
echo $meta->generateShortDescription() . PHP_EOL;
echo $meta->renderMetaTags();