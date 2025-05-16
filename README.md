# 一言(yiyan)API服务
动态网站设计-课程设计作业
一个提供随机或特定类型句子的API服务

## 功能特性

- 提供随机或特定类型的句子
- 支持多种句子类型(动画、漫画、游戏等)
- 支持JSON格式返回
- 内置管理后台
- 响应式设计，适配各种设备

## 快速开始

### 环境要求

- PHP 8.0（需启用getenv函数）
- MySQL 5.7+
- Web服务器(Apache/Nginx)

### 配置说明

#### 启用getenv函数
本系统依赖getenv函数读取环境变量配置，如果遇到函数禁用错误，请按以下方式解决：

1. **修改php.ini**：
   - 找到`disable_functions`配置项
   - 移除其中的`getenv()`（如果有）
   - 重启PHP服务

2. **共享主机解决方案**：
   - 在`.htaccess`中添加：
     ```
     php_value disable_functions ""
     ```
   - 或联系主机提供商解禁getenv()

### 安装步骤

# 克隆仓库：
   ```bash
   git clone https://github.com/Linghan0/API-yiyan.git
   ```

# 配置环境：
   - 复制`.env.example`为`.env`
   - 修改数据库配置
   - 设置API基础URL

# 创建数据库并导入tabal.sql



## API文档

### 请求地址

```
GET /yiyan/yiyan.php
```

### 可选参数

| 参数   | 说明       |
|--------|------------|
| text   | 内容关键词 |
| type   | 句子类型   |
| format | 返回格式   |

### 句子类型

| 类型 | 说明   |
|------|--------|
| a    | 动画   |
| b    | 漫画   |
| c    | 游戏   |
| d    | 文学   |
| e    | 原创   |
| f    | 网络   |
| g    | 其他   |
| h    | 影视   |
| i    | 诗词   |

### 返回示例

```json
{
  "type": "ok",
  "return": {
    "id": 3078,
    "uuid": "cc2b77b1-9ea2-46c2-8b96-1dee6e8ebe96",
    "hitokoto": "大家热爱的事物...",
    "type": "a",
    "from_where": "恋爱小行星",
    "from_who": "木之本樱",
    "creator": "yuuna",
    "creator_uid": 5606,
    "reviewer": 4756,
    "commit_from": "web",
    "created_at": 1585356147,
    "length": 68
  }
}
```

## 管理后台

访问`/admin`路径进入管理后台，功能包括：
- 句子管理
- 用户管理
- 数据统计

## 相关参考

- [hitokoto](https://hitokoto.cn/)
- [hitokoto-api](https://github.com/hitokoto-osc/hitokoto-api)

## 许可证

MIT
