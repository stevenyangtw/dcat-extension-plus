# Dcat Plus

为 DcatAdmin 后台添加增强配置的功能。修改过程利用 DcatAdmin 自带的 `admin_setting()` 方法实现，不会硬编码修改任何 config 文件或者 .env 文件。

## 安装方式

### 本地安装

下载本项目 `.zip` 包，在 `DcatAdmin` 后台的 `扩展` 菜单中，通过上传进行安装。

### Composer 安装

`composer require celaraze/dcat-extension-plus`

### 使用

在菜单 `扩展` 中启用扩展后，会自动添加名为 `站点配置` 的菜单。

### 功能

#### 站点配置

站点标题

站点 LOGO

站点微缩 LOGO

站点静态资源 URL

调试模式

#### UI优化

移除底部授权

头部块状显示

侧栏缩进增大

##### 扩展字段类型

快速创建选项：表单可用 `selectCreate()` 字段类型，是 `select` 字段的增强，支持在右侧添加快速创建选项的按钮，异步添加值。

```PHP
$form->selectCreate('department','部门')
    ->options(Department::class)
    ->url('/departments/create')    // 异步打开的页面，这里是部门创建的页面url
    ->ajax('/api/departments')      // 必须适用 api 方式取选项列表，格式同 select 字段的使用方法
    ->required();
```
