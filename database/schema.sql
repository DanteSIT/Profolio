CREATE DATABASE IF NOT EXISTS profolio_cms
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE profolio_cms;

-- --------------------------------------------------------
-- Users
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username    VARCHAR(50)  NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  full_name   VARCHAR(100) NOT NULL DEFAULT '',
  created_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Sites
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS sites (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name        VARCHAR(150) NOT NULL,
  slug        VARCHAR(100) NOT NULL UNIQUE,
  description TEXT         NOT NULL,
  is_active   TINYINT(1)   NOT NULL DEFAULT 1,
  created_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Site settings
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS site_settings (
  id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id      INT UNSIGNED NOT NULL,
  setting_key  VARCHAR(100) NOT NULL,
  setting_value TEXT        NOT NULL,
  UNIQUE KEY uq_site_setting (site_id, setting_key),
  CONSTRAINT fk_settings_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- About sections
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS about_sections (
  id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id    INT UNSIGNED NOT NULL,
  content    TEXT         NOT NULL,
  sort_order INT          NOT NULL DEFAULT 0,
  CONSTRAINT fk_about_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Credentials
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS credentials (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id     INT UNSIGNED NOT NULL,
  title       VARCHAR(150) NOT NULL DEFAULT '',
  status_text VARCHAR(100) NOT NULL DEFAULT '',
  provider    VARCHAR(100) NOT NULL DEFAULT '',
  image_paths TEXT         NOT NULL,
  sort_order  INT          NOT NULL DEFAULT 0,
  CONSTRAINT fk_credentials_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Experiences
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS experiences (
  id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id      INT UNSIGNED NOT NULL,
  company      VARCHAR(150) NOT NULL DEFAULT '',
  is_current   TINYINT(1)   NOT NULL DEFAULT 0,
  is_completed TINYINT(1)   NOT NULL DEFAULT 0,
  badge        VARCHAR(100) NOT NULL DEFAULT '',
  description  TEXT         NOT NULL,
  sort_order   INT          NOT NULL DEFAULT 0,
  CONSTRAINT fk_experiences_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Experience roles
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS experience_roles (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  experience_id INT UNSIGNED NOT NULL,
  title         VARCHAR(150) NOT NULL DEFAULT '',
  dates         VARCHAR(100) NOT NULL DEFAULT '',
  sort_order    INT          NOT NULL DEFAULT 0,
  CONSTRAINT fk_roles_experience FOREIGN KEY (experience_id) REFERENCES experiences(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Skills
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS skills (
  id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id    INT UNSIGNED NOT NULL,
  category   VARCHAR(100) NOT NULL DEFAULT '',
  items      JSON         NOT NULL,
  sort_order INT          NOT NULL DEFAULT 0,
  CONSTRAINT fk_skills_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Projects
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS projects (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id     INT UNSIGNED NOT NULL,
  title       VARCHAR(150) NOT NULL DEFAULT '',
  description TEXT         NOT NULL,
  tags        JSON         NOT NULL,
  link        VARCHAR(500) NOT NULL DEFAULT '',
  bg_class    VARCHAR(100) NOT NULL DEFAULT '',
  icon        VARCHAR(100) NOT NULL DEFAULT '',
  sort_order  INT          NOT NULL DEFAULT 0,
  CONSTRAINT fk_projects_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Certifications
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS certifications (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id     INT UNSIGNED NOT NULL,
  category    VARCHAR(100) NOT NULL DEFAULT '',
  title       VARCHAR(200) NOT NULL DEFAULT '',
  description TEXT         NOT NULL,
  image_path  VARCHAR(500) NOT NULL DEFAULT '',
  link        VARCHAR(500) NOT NULL DEFAULT '',
  label       VARCHAR(100) NOT NULL DEFAULT '',
  sort_order  INT          NOT NULL DEFAULT 0,
  CONSTRAINT fk_certs_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- News
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS news (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id     INT UNSIGNED NOT NULL,
  title       VARCHAR(200) NOT NULL DEFAULT '',
  content     TEXT         NOT NULL,
  category    VARCHAR(100) NOT NULL DEFAULT '',
  date_label  VARCHAR(50)  NOT NULL DEFAULT '',
  tag         VARCHAR(50)  NOT NULL DEFAULT '',
  link        VARCHAR(500) NOT NULL DEFAULT '',
  link_text   VARCHAR(100) NOT NULL DEFAULT '',
  sort_order  INT          NOT NULL DEFAULT 0,
  created_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_news_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Social links
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS social_links (
  id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id   INT UNSIGNED NOT NULL,
  platform  VARCHAR(50)  NOT NULL DEFAULT '',
  url       VARCHAR(500) NOT NULL DEFAULT '',
  svg_icon  TEXT         NOT NULL,
  sort_order INT         NOT NULL DEFAULT 0,
  CONSTRAINT fk_social_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- YouTube config
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS youtube_config (
  id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id      INT UNSIGNED NOT NULL,
  channel_id   VARCHAR(100) NOT NULL DEFAULT '',
  channel_name VARCHAR(150) NOT NULL DEFAULT '',
  auto_fetch   TINYINT(1)   NOT NULL DEFAULT 0,
  last_fetched DATETIME     NULL DEFAULT NULL,
  CONSTRAINT fk_ytconfig_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- YouTube videos
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS youtube_videos (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  site_id       INT UNSIGNED NOT NULL,
  video_id      VARCHAR(30)  NOT NULL DEFAULT '',
  title         VARCHAR(200) NOT NULL DEFAULT '',
  thumbnail_url VARCHAR(500) NOT NULL DEFAULT '',
  published_at  DATETIME     NULL DEFAULT NULL,
  views         INT UNSIGNED NOT NULL DEFAULT 0,
  sort_order    INT          NOT NULL DEFAULT 0,
  is_featured   TINYINT(1)   NOT NULL DEFAULT 0,
  CONSTRAINT fk_ytvids_site FOREIGN KEY (site_id) REFERENCES sites(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- Seed data
-- ============================================================

-- Admin user (password = admin123)
INSERT INTO users (username, password_hash, full_name)
VALUES (
  'dante',
  '$2y$10$hM9Y9k.kRuNB0Tm5/ItgN.se9vKw0cyBBUHSND1Xo/GltnNjHcIl6',
  'Dante Lespoir'
);

-- Default site
INSERT INTO sites (name, slug, description)
VALUES (
  'Dante Lespoir Portfolio',
  'profolio',
  'My personal portfolio'
);
