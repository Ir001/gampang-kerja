<?='<?xml version="1.0" encoding="utf-8"?><?xml-stylesheet type="text/xsl" href="/assets/sitemap.xsl"?>';?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url><loc><?=base_url()?></loc><changefreq>daily</changefreq><priority>1.0</priority></url>
        <?php foreach($post as $url):?>
        <url><loc><?=base_url('perusahaan/'.$url['url'])?></loc><lastmod><?=date('Y-m-d');?></lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>
        <?php endforeach;?>        
    </urlset>