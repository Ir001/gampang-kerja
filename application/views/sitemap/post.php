<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   <url>

      <loc><?=base_url();?></loc>

      <priority>1</priority>

   </url>
    <?php foreach($post as $url):?>
   <url>

      <loc><?=base_url().'lowongan/'.str_replace(' ', '-', strtolower($url['perusahaan_name'])).'/'.$url['permalink'];?></loc>
      <lastmod><?=date('Y-m-d', strtotime($url['posted_at']));?></lastmod>
      <priority>0.8</priority>

   </url>
    <?php endforeach;?>

</urlset>