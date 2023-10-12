# perpustakaan_terstruktur

## DDL



```
CREATE DATABASE IF NOT EXISTS `perpus_terstruktur`;
USE `perpus_terstruktur`;


CREATE TABLE IF NOT EXISTS `buku` (
  `idbuku` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(45) DEFAULT NULL,
  `PENERBIT` varchar(45) DEFAULT NULL,
  `PENULIS` varchar(45) DEFAULT NULL,
  `cover_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idbuku`)
);


CREATE TABLE IF NOT EXISTS `cart` (
  `idCART` int unsigned NOT NULL AUTO_INCREMENT,
  `buku_idbuku` int unsigned NOT NULL,
  PRIMARY KEY (`idCART`),
  KEY `CART_FKIndex2` (`buku_idbuku`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`)
);

CREATE TABLE IF NOT EXISTS `dipinjam` (
  `peminjaman_idpeminjaman` int unsigned NOT NULL,
  `buku_idbuku` int unsigned NOT NULL,
  `hari` int unsigned DEFAULT NULL,
  PRIMARY KEY (`peminjaman_idpeminjaman`,`buku_idbuku`),
  KEY `peminjaman_has_buku_FKIndex1` (`peminjaman_idpeminjaman`),
  KEY `peminjaman_has_buku_FKIndex2` (`buku_idbuku`),
  CONSTRAINT `dipinjam_ibfk_1` FOREIGN KEY (`peminjaman_idpeminjaman`) REFERENCES `peminjaman` (`idpeminjaman`),
  CONSTRAINT `dipinjam_ibfk_2` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`)
);


CREATE TABLE IF NOT EXISTS `peminjaman` (
  `idpeminjaman` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_ambil` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  PRIMARY KEY (`idpeminjaman`)
);

```

## Integrate with your tools

- [ ] [Set up project integrations](https://gitlab.com/ies5/perpustakaan_terstruktur/-/settings/integrations)

## Collaborate with your team

- [ ] [Invite team members and collaborators](https://docs.gitlab.com/ee/user/project/members/)
- [ ] [Create a new merge request](https://docs.gitlab.com/ee/user/project/merge_requests/creating_merge_requests.html)
- [ ] [Automatically close issues from merge requests](https://docs.gitlab.com/ee/user/project/issues/managing_issues.html#closing-issues-automatically)
- [ ] [Enable merge request approvals](https://docs.gitlab.com/ee/user/project/merge_requests/approvals/)
- [ ] [Set auto-merge](https://docs.gitlab.com/ee/user/project/merge_requests/merge_when_pipeline_succeeds.html)

## Test and Deploy

Use the built-in continuous integration in GitLab.

- [ ] [Get started with GitLab CI/CD](https://docs.gitlab.com/ee/ci/quick_start/index.html)
- [ ] [Analyze your code for known vulnerabilities with Static Application Security Testing(SAST)](https://docs.gitlab.com/ee/user/application_security/sast/)
- [ ] [Deploy to Kubernetes, Amazon EC2, or Amazon ECS using Auto Deploy](https://docs.gitlab.com/ee/topics/autodevops/requirements.html)
- [ ] [Use pull-based deployments for improved Kubernetes management](https://docs.gitlab.com/ee/user/clusters/agent/)
- [ ] [Set up protected environments](https://docs.gitlab.com/ee/ci/environments/protected_environments.html)

***
