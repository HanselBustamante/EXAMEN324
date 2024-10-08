USE [master]
GO
/****** Object:  Database [BDHansel]    Script Date: 10/5/2024 4:26:21 AM ******/
CREATE DATABASE [BDHansel]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'BDHansel', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\BDHansel.mdf' , SIZE = 3072KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'BDHansel_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\BDHansel_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [BDHansel] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [BDHansel].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [BDHansel] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [BDHansel] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [BDHansel] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [BDHansel] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [BDHansel] SET ARITHABORT OFF 
GO
ALTER DATABASE [BDHansel] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [BDHansel] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [BDHansel] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [BDHansel] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [BDHansel] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [BDHansel] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [BDHansel] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [BDHansel] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [BDHansel] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [BDHansel] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [BDHansel] SET  DISABLE_BROKER 
GO
ALTER DATABASE [BDHansel] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [BDHansel] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [BDHansel] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [BDHansel] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [BDHansel] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [BDHansel] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [BDHansel] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [BDHansel] SET RECOVERY FULL 
GO
ALTER DATABASE [BDHansel] SET  MULTI_USER 
GO
ALTER DATABASE [BDHansel] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [BDHansel] SET DB_CHAINING OFF 
GO
ALTER DATABASE [BDHansel] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [BDHansel] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
EXEC sys.sp_db_vardecimal_storage_format N'BDHansel', N'ON'
GO
USE [BDHansel]
GO
/****** Object:  Table [dbo].[Catastro]    Script Date: 10/5/2024 4:26:21 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Catastro](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[zona] [varchar](100) NULL,
	[x_ini] [float] NULL,
	[y_ini] [float] NULL,
	[x_fin] [float] NULL,
	[y_fin] [float] NULL,
	[superficie] [float] NULL,
	[ci_persona] [varchar](20) NULL,
	[distrito] [varchar](50) NULL,
	[id_tramite] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Persona]    Script Date: 10/5/2024 4:26:21 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Persona](
	[ci] [varchar](20) NOT NULL,
	[nombre] [varchar](100) NULL,
	[paterno] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[ci] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Tramites]    Script Date: 10/5/2024 4:26:21 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Tramites](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tipo_tramite] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Catastro] ON 

INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (1, N'Plaza Murillo', -16.507, -68.12, -16.51, -68.117, 400, N'9876543', N'Centro Histórico', 2)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (2, N'Plaza Murillo', -16.513, -68.14, -16.515, -68.137, 800, N'4567890', N'Centro Histórico', 1)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (3, N'Achumani', -16.538, -68.085, -16.54, -68.082, 800, N'6543210', N'6', NULL)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (4, N'El Tejar', 1, 2, 3, 4, 200, N'10084126', N'El Tejar', 2)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (5, N'Zona 1', -16.5, -68.119, -16.497, -68.117, 120, N'1111111', N'Centro Histórico', NULL)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (6, N'Zona 3', -16.5, -68.125, -16.498, -68.123, 220, N'3333333', N'San Pedro', NULL)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (7, N'Zona 5', -16.494, -68.115, -16.492, -68.113, 310, N'5555555', N'Achumani', NULL)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (8, N'Villa San Antonio', 1, 2, 3, 4, 800, N'4444', N'Villa San Antonio', 1)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (9, NULL, 1, 2, 3, 4, 200, N'8888', NULL, NULL)
INSERT [dbo].[Catastro] ([id], [zona], [x_ini], [y_ini], [x_fin], [y_fin], [superficie], [ci_persona], [distrito], [id_tramite]) VALUES (10, NULL, 1, 2, 3, 4, 10000, N'999', NULL, NULL)
SET IDENTITY_INSERT [dbo].[Catastro] OFF
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'10084126', N'Hansel', N'Bustamante')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'1111111', N'Fernando', N'Lopez')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'3333333', N'Diego', N'Pérez')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'4444', N'Alan', N'Callisaya')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'4567890', N'Carlos', N'Quisp')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'5555555', N'Sofía', N'López')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'6543210', N'José', N'Flores')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'8888', N'HB', N'Quisp')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'9876543', N'María', N'Gutiérrez')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'999', N'Hansel', N'Bustamante')
INSERT [dbo].[Persona] ([ci], [nombre], [paterno]) VALUES (N'admin', N'Admin', N'User')
SET IDENTITY_INSERT [dbo].[Tramites] ON 

INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (1, N'Inscripción de Propiedad')
INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (2, N'Transferencia de Propiedad')
INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (3, N'Actualización de Datos')
INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (4, N'Registro de Propiedad')
INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (5, N'Inscripción de Inmuebles')
INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (6, N'Cambio de Propietario')
INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (7, N'Fraccionamiento')
INSERT [dbo].[Tramites] ([id], [tipo_tramite]) VALUES (8, N'Consulta de Catastro')
SET IDENTITY_INSERT [dbo].[Tramites] OFF
ALTER TABLE [dbo].[Catastro]  WITH CHECK ADD FOREIGN KEY([ci_persona])
REFERENCES [dbo].[Persona] ([ci])
GO
ALTER TABLE [dbo].[Catastro]  WITH CHECK ADD FOREIGN KEY([id_tramite])
REFERENCES [dbo].[Tramites] ([id])
GO
USE [master]
GO
ALTER DATABASE [BDHansel] SET  READ_WRITE 
GO
