<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/functions.php';

auth_require();
$user = auth_user();
$slug = $_GET['site'] ?? '';
if ($slug === '' || $slug === 'new') { redirect('dashboard.php'); }
$site = get_site_by_slug($slug);
if (!$site) { flash('error', 'Site not found.'); redirect('dashboard.php'); }
$site_id = $site['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage: <?php echo htmlspecialchars($site['name']); ?></title>
<link rel="stylesheet" href="css/cms.css">
</head>
<body>

<header class="cms-header">
    <a href="dashboard.php" class="brand">Portfolio <span>CMS</span></a>
    <div class="cms-header-right">
        <span class="cms-header-user">Signed in as <strong><?php echo htmlspecialchars($user['username']); ?></strong></span>
        <a href="logout.php" class="cms-logout">Logout</a>
    </div>
</header>

<div class="cms-container">
    <h1 style="font-size:1.75rem;font-weight:600;margin-bottom:0.5rem;"><?php echo htmlspecialchars($site['name']); ?></h1>
    <p style="color:var(--muted);margin-bottom:1.5rem;">Manage content for this site.</p>

    <div class="cms-tabs">
        <button class="cms-tab active" data-tab="about">About</button>
        <button class="cms-tab" data-tab="projects">Projects</button>
        <button class="cms-tab" data-tab="certifications">Certifications</button>
        <button class="cms-tab" data-tab="news">News</button>
        <button class="cms-tab" data-tab="youtube">YouTube</button>
        <button class="cms-tab" data-tab="settings">Settings</button>
    </div>

    <div class="cms-panel active" id="panel-about">
        <div id="about-list"></div>
        <button class="cms-btn cms-btn-primary" onclick="showAboutForm()">+ Add Section</button>
    </div>

    <div class="cms-panel" id="panel-projects">
        <div id="projects-list"></div>
        <button class="cms-btn cms-btn-primary" onclick="showProjectForm()">+ Add Project</button>
    </div>

    <div class="cms-panel" id="panel-certifications">
        <div id="certs-list"></div>
        <button class="cms-btn cms-btn-primary" onclick="showCertForm()">+ Add Certification</button>
    </div>

    <div class="cms-panel" id="panel-news">
        <div id="news-list"></div>
        <button class="cms-btn cms-btn-primary" onclick="showNewsForm()">+ Add News</button>
    </div>

    <div class="cms-panel" id="panel-youtube">
        <div id="yt-list"></div>
        <button class="cms-btn cms-btn-primary" onclick="syncYT()">Sync from YouTube</button>
    </div>

    <div class="cms-panel" id="panel-settings">
        <div class="cms-card" style="max-width:600px;">
            <div class="cms-form-group"><label>Site Name</label><input id="set-name" value="<?php echo htmlspecialchars($site['name']); ?>"></div>
            <div class="cms-form-group"><label>Description</label><textarea id="set-desc"><?php echo htmlspecialchars($site['description']); ?></textarea></div>
            <button class="cms-btn cms-btn-primary" onclick="saveSettings()">Save</button>
        </div>
    </div>
</div>

<div class="cms-modal-overlay" id="modal">
    <div class="cms-modal-box" id="modal-body"></div>
</div>
<div id="toast" class="cms-toast"></div>

<script>
var SID = <?php echo $site_id; ?>;
var API = 'api/crud.php';

function api(d, cb) {
    fetch(API, {method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify(d)})
    .then(function(r){return r.json();}).then(cb).catch(function(){toast('Network error',true);});
}
function toast(m, e) {
    var t=document.getElementById('toast'); t.textContent=m; t.className='cms-toast'+(e?' error':''); t.style.display='block';
    setTimeout(function(){t.style.display='none';},3000);
}
function openModal(h) { document.getElementById('modal-body').innerHTML=h; document.getElementById('modal').classList.add('open'); }
function closeModal() { document.getElementById('modal').classList.remove('open'); }
function esc(s) { if(!s)return ''; var d=document.createElement('div'); d.textContent=s; return d.innerHTML; }

document.getElementById('modal').addEventListener('click', function(e){ if(e.target===this) closeModal(); });
document.querySelectorAll('.cms-tab').forEach(function(b){
    b.addEventListener('click', function(){
        document.querySelectorAll('.cms-tab').forEach(function(x){x.classList.remove('active');});
        document.querySelectorAll('.cms-panel').forEach(function(x){x.classList.remove('active');});
        b.classList.add('active'); document.getElementById('panel-'+b.dataset.tab).classList.add('active');
    });
});

function delItem(table, id, reload) {
    if(!confirm('Delete this item?')) return;
    api({action:'delete', table:table, id:id}, function(){ toast('Deleted!'); reload(); });
}

// --- ABOUT ---
function loadAbout() {
    api({action:'list', table:'about_sections', site_id:SID}, function(r){
        var h=''; if(!r.data||!r.data.length) h='<div class="cms-empty">No about sections yet.</div>';
        else r.data.forEach(function(d){
            h+='<div class="cms-card"><div class="cms-card-header"><span class="cms-card-title">Section #'+d.sort_order+'</span><div class="cms-card-actions">';
            h+='<button class="cms-btn cms-btn-secondary" onclick="editAbout('+d.id+')">Edit</button> ';
            h+='<button class="cms-btn cms-btn-danger" onclick="delItem(\'about_sections\','+d.id+',loadAbout)">Delete</button>';
            h+='</div></div><div class="cms-card-body">'+esc(d.content)+'</div></div>';
        });
        document.getElementById('about-list').innerHTML=h;
    });
}
function showAboutForm(id, d) {
    d=d||{};
    openModal('<h3 style="margin-bottom:1rem;">'+(id?'Edit':'Add')+' About Section</h3>'+
        '<div class="cms-form-group"><label>Content</label><textarea id="f-content">'+esc(d.content||'')+'</textarea></div>'+
        '<div class="cms-form-group"><label>Sort Order</label><input type="number" id="f-sort" value="'+(d.sort_order||0)+'"></div>'+
        '<button class="cms-btn cms-btn-primary" onclick="saveAbout('+(id||'null')+')">Save</button> <button class="cms-btn cms-btn-secondary" onclick="closeModal()">Cancel</button>');
}
function editAbout(id) {
    api({action:'list',table:'about_sections',site_id:SID},function(r){
        var item=r.data.find(function(x){return x.id==id;});
        if(item) showAboutForm(id, item);
    });
}
function saveAbout(id) {
    var d={content:document.getElementById('f-content').value, sort_order:parseInt(document.getElementById('f-sort').value)||0, site_id:SID};
    if(id) api({action:'update',table:'about_sections',id:id,data:d},function(){closeModal();loadAbout();toast('Updated!');});
    else api({action:'create',table:'about_sections',data:d},function(){closeModal();loadAbout();toast('Created!');});
}

// --- PROJECTS ---
function loadProjects() {
    api({action:'list',table:'projects',site_id:SID},function(r){
        var h=''; if(!r.data||!r.data.length) h='<div class="cms-empty">No projects yet.</div>';
        else r.data.forEach(function(d){
            h+='<div class="cms-card"><div class="cms-card-header"><span class="cms-card-title">'+esc(d.title)+'</span><div class="cms-card-actions">';
            h+='<button class="cms-btn cms-btn-secondary" onclick="editProject('+d.id+')">Edit</button> ';
            h+='<button class="cms-btn cms-btn-danger" onclick="delItem(\'projects\','+d.id+',loadProjects)">Delete</button>';
            h+='</div></div><div class="cms-card-body">'+esc(d.description)+'</div>';
            h+='<div class="cms-card-meta">Tags: '+esc(d.tags)+' | Link: '+esc(d.link)+'</div></div>';
        });
        document.getElementById('projects-list').innerHTML=h;
    });
}
function showProjectForm(id, d) {
    d=d||{};
    var tags=''; try{tags=typeof d.tags==='string'?JSON.parse(d.tags).join(', '):'';}catch(e){tags=d.tags||'';}
    openModal('<h3 style="margin-bottom:1rem;">'+(id?'Edit':'Add')+' Project</h3>'+
        '<div class="cms-form-group"><label>Title</label><input id="f-title" value="'+esc(d.title||'')+'"></div>'+
        '<div class="cms-form-group"><label>Description</label><textarea id="f-desc">'+esc(d.description||'')+'</textarea></div>'+
        '<div class="cms-form-row"><div class="cms-form-group"><label>Tags (comma-sep)</label><input id="f-tags" value="'+esc(tags)+'"></div>'+
        '<div class="cms-form-group"><label>Icon</label><input id="f-icon" value="'+esc(d.icon||'')+'"></div></div>'+
        '<div class="cms-form-row"><div class="cms-form-group"><label>Link</label><input id="f-link" value="'+esc(d.link||'')+'"></div>'+
        '<div class="cms-form-group"><label>BG Class</label><input id="f-bg" value="'+esc(d.bg_class||'')+'"></div></div>'+
        '<div class="cms-form-group"><label>Sort Order</label><input type="number" id="f-sort" value="'+(d.sort_order||0)+'"></div>'+
        '<button class="cms-btn cms-btn-primary" onclick="saveProject('+(id||'null')+')">Save</button> <button class="cms-btn cms-btn-secondary" onclick="closeModal()">Cancel</button>');
}
function editProject(id) {
    api({action:'list',table:'projects',site_id:SID},function(r){
        var item=r.data.find(function(x){return x.id==id;});
        if(item) showProjectForm(id, item);
    });
}
function saveProject(id) {
    var tags=document.getElementById('f-tags').value.split(',').map(function(s){return s.trim();}).filter(Boolean);
    var d={title:document.getElementById('f-title').value,description:document.getElementById('f-desc').value,
        tags:JSON.stringify(tags),icon:document.getElementById('f-icon').value,link:document.getElementById('f-link').value,
        bg_class:document.getElementById('f-bg').value,sort_order:parseInt(document.getElementById('f-sort').value)||0,site_id:SID};
    if(id) api({action:'update',table:'projects',id:id,data:d},function(){closeModal();loadProjects();toast('Updated!');});
    else api({action:'create',table:'projects',data:d},function(){closeModal();loadProjects();toast('Created!');});
}

// --- CERTIFICATIONS ---
function loadCerts() {
    api({action:'list',table:'certifications',site_id:SID},function(r){
        var h=''; if(!r.data||!r.data.length) h='<div class="cms-empty">No certifications yet.</div>';
        else r.data.forEach(function(d){
            h+='<div class="cms-card"><div class="cms-card-header"><span class="cms-card-title">'+esc(d.title)+'</span><div class="cms-card-actions">';
            h+='<button class="cms-btn cms-btn-secondary" onclick="editCert('+d.id+')">Edit</button> ';
            h+='<button class="cms-btn cms-btn-danger" onclick="delItem(\'certifications\','+d.id+',loadCerts)">Delete</button>';
            h+='</div></div><div class="cms-card-meta">Category: '+esc(d.category)+' | Label: '+esc(d.label)+'</div></div>';
        });
        document.getElementById('certs-list').innerHTML=h;
    });
}
function showCertForm(id,d) {
    d=d||{};
    openModal('<h3 style="margin-bottom:1rem;">'+(id?'Edit':'Add')+' Certification</h3>'+
        '<div class="cms-form-group"><label>Title</label><input id="f-title" value="'+esc(d.title||'')+'"></div>'+
        '<div class="cms-form-row"><div class="cms-form-group"><label>Category</label><input id="f-cat" value="'+esc(d.category||'')+'"></div>'+
        '<div class="cms-form-group"><label>Label</label><input id="f-label" value="'+esc(d.label||'')+'"></div></div>'+
        '<div class="cms-form-group"><label>Description</label><textarea id="f-desc">'+esc(d.description||'')+'</textarea></div>'+
        '<div class="cms-form-row"><div class="cms-form-group"><label>Image Path</label><input id="f-img" value="'+esc(d.image_path||'')+'"></div>'+
        '<div class="cms-form-group"><label>Link</label><input id="f-link" value="'+esc(d.link||'')+'"></div></div>'+
        '<div class="cms-form-group"><label>Sort Order</label><input type="number" id="f-sort" value="'+(d.sort_order||0)+'"></div>'+
        '<button class="cms-btn cms-btn-primary" onclick="saveCert('+(id||'null')+')">Save</button> <button class="cms-btn cms-btn-secondary" onclick="closeModal()">Cancel</button>');
}
function editCert(id) {
    api({action:'list',table:'certifications',site_id:SID},function(r){
        var item=r.data.find(function(x){return x.id==id;});
        if(item) showCertForm(id,item);
    });
}
function saveCert(id) {
    var d={title:document.getElementById('f-title').value,category:document.getElementById('f-cat').value,
        label:document.getElementById('f-label').value,description:document.getElementById('f-desc').value,
        image_path:document.getElementById('f-img').value,link:document.getElementById('f-link').value,
        sort_order:parseInt(document.getElementById('f-sort').value)||0,site_id:SID};
    if(id) api({action:'update',table:'certifications',id:id,data:d},function(){closeModal();loadCerts();toast('Updated!');});
    else api({action:'create',table:'certifications',data:d},function(){closeModal();loadCerts();toast('Created!');});
}

// --- NEWS ---
function loadNews() {
    api({action:'list',table:'news',site_id:SID},function(r){
        var h=''; if(!r.data||!r.data.length) h='<div class="cms-empty">No news yet.</div>';
        else r.data.forEach(function(d){
            h+='<div class="cms-card"><div class="cms-card-header"><span class="cms-card-title">'+esc(d.title)+'</span><div class="cms-card-actions">';
            h+='<button class="cms-btn cms-btn-secondary" onclick="editNews('+d.id+')">Edit</button> ';
            h+='<button class="cms-btn cms-btn-danger" onclick="delItem(\'news\','+d.id+',loadNews)">Delete</button>';
            h+='</div></div><div class="cms-card-body">'+esc(d.content)+'</div>';
            h+='<div class="cms-card-meta">'+esc(d.category)+' | '+esc(d.date_label)+'</div></div>';
        });
        document.getElementById('news-list').innerHTML=h;
    });
}
function showNewsForm(id,d) {
    d=d||{};
    openModal('<h3 style="margin-bottom:1rem;">'+(id?'Edit':'Add')+' News</h3>'+
        '<div class="cms-form-group"><label>Title</label><input id="f-title" value="'+esc(d.title||'')+'"></div>'+
        '<div class="cms-form-group"><label>Content</label><textarea id="f-content">'+esc(d.content||'')+'</textarea></div>'+
        '<div class="cms-form-row"><div class="cms-form-group"><label>Category</label><input id="f-cat" value="'+esc(d.category||'')+'"></div>'+
        '<div class="cms-form-group"><label>Date Label</label><input id="f-date" value="'+esc(d.date_label||'')+'"></div></div>'+
        '<div class="cms-form-row"><div class="cms-form-group"><label>Tag</label><input id="f-tag" value="'+esc(d.tag||'')+'"></div>'+
        '<div class="cms-form-group"><label>Link</label><input id="f-link" value="'+esc(d.link||'')+'"></div></div>'+
        '<div class="cms-form-group"><label>Link Text</label><input id="f-lt" value="'+esc(d.link_text||'')+'"></div>'+
        '<div class="cms-form-group"><label>Sort Order</label><input type="number" id="f-sort" value="'+(d.sort_order||0)+'"></div>'+
        '<button class="cms-btn cms-btn-primary" onclick="saveNews('+(id||'null')+')">Save</button> <button class="cms-btn cms-btn-secondary" onclick="closeModal()">Cancel</button>');
}
function editNews(id) {
    api({action:'list',table:'news',site_id:SID},function(r){
        var item=r.data.find(function(x){return x.id==id;});
        if(item) showNewsForm(id,item);
    });
}
function saveNews(id) {
    var d={title:document.getElementById('f-title').value,content:document.getElementById('f-content').value,
        category:document.getElementById('f-cat').value,date_label:document.getElementById('f-date').value,
        tag:document.getElementById('f-tag').value,link:document.getElementById('f-link').value,
        link_text:document.getElementById('f-lt').value,
        sort_order:parseInt(document.getElementById('f-sort').value)||0,site_id:SID};
    if(id) api({action:'update',table:'news',id:id,data:d},function(){closeModal();loadNews();toast('Updated!');});
    else api({action:'create',table:'news',data:d},function(){closeModal();loadNews();toast('Created!');});
}

// --- YOUTUBE ---
function loadYT() {
    api({action:'list',table:'youtube_videos',site_id:SID},function(r){
        var h=''; if(!r.data||!r.data.length) h='<div class="cms-empty">No videos synced yet.</div>';
        else r.data.forEach(function(d){
            h+='<div class="cms-card"><div class="cms-card-header"><span class="cms-card-title">'+esc(d.title)+'</span><div class="cms-card-actions">';
            h+='<button class="cms-btn cms-btn-danger" onclick="delItem(\'youtube_videos\','+d.id+',loadYT)">Delete</button>';
            h+='</div></div><div class="cms-card-meta">Views: '+d.views+' | '+esc(d.video_id)+'</div></div>';
        });
        document.getElementById('yt-list').innerHTML=h;
    });
}
function syncYT() {
    var cid=prompt('Enter your YouTube Channel ID:');
    if(!cid) return;
    toast('Syncing...');
    api({action:'youtube_sync',site_id:SID,channel_id:cid,data:{}},function(r){ toast(r.message||'Done'); loadYT(); });
}

// --- SETTINGS ---
function saveSettings() {
    var d={name:document.getElementById('set-name').value,description:document.getElementById('set-desc').value};
    api({action:'update',table:'sites',id:SID,data:d},function(){toast('Saved!');});
}

// Load all
loadAbout(); loadProjects(); loadCerts(); loadNews(); loadYT();
</script>
</body>
</html>