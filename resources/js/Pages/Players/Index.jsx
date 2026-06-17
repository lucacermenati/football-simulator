import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import PlayerTable from "./Components/PlayerTable";
import Searchbar from "@/Components/Searchbar";
import Pagination from "@/Components/Pagination";
import { useState, useEffect } from "react";
import Modal from "@/Components/Modal";
import PlayerGenerate from "./Components/PlayerGenerate";
import InputLabel from "@/Components/InputLabel";
import PlayerCreate from "./Components/PlayerCreate";
import PlayerDelete from "./Components/PlayerDelete";
import PlayerAdd from "./Components/PlayerAdd";
import Flag from "@/Components/Flag";
import { ROLES, ROLE_COLOR_CLASSES } from "@/Enum/roles";

export default function PlayersIndex({
    players,
    filters,
    nationalities,
    teams,
}) {
    const [isNationalityModalOpen, setIsNationalityModalOpen] = useState(false);
    const [isCreateModalOpen, setIsCreateModalOpen] = useState(false);
    const [isGenerateModalOpen, setIsGenerateModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);
    const [isAddModalOpen, setIsAddModalOpen] = useState(false);
    const [selectedPlayer, setSelectedPlayer] = useState(null);

    const [query, setQuery] = useState({
        search: filters.search,
        free: filters.free,
        role: filters.role,
        nationality: filters.nationality,
        page: filters.page,
    });

    useEffect(() => {
        router.get(
            route("players.index"),
            {
                search: query.search || undefined,
                free: query.free ? 1 : undefined,
                role: query.role || undefined,
                nationality: query.nationality || undefined,
                page: filters.page || undefined,
            },
            {
                preserveState: true,
                preserveScroll: true,
                replace: true,
            },
        );
    }, [query]);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Players
                </h2>
            }
        >
            <Head title="Players" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center mt-2 mb-6">
                        {/* Filters */}
                        <div className="flex justify-start items-center space-x-6">
                            <Searchbar
                                onSearch={(search) => {
                                    setQuery((query) => {
                                        return {
                                            ...query,
                                            search: search,
                                            page: null,
                                        };
                                    });
                                }}
                            />
                            <div
                                onClick={() =>
                                    setQuery((query) => {
                                        return {
                                            ...query,
                                            free: !query.free,
                                            page: null,
                                        };
                                    })
                                }
                                className={`w-6 h-6 rounded-full cursor-pointer bg-lightGrey-600 ${filters.free ? "border-2 border-primaryRed-600" : ""}`}
                            />
                            <div className="flex justify-start items-center space-x-2">
                                {ROLES.map((role) => (
                                    <div
                                        key={role}
                                        onClick={() =>
                                            setQuery((query) => {
                                                return {
                                                    ...query,
                                                    role:
                                                        role === query.role
                                                            ? null
                                                            : role,
                                                    page: null,
                                                };
                                            })
                                        }
                                        className={`w-6 h-6 rounded-full cursor-pointer bg-roleColors-${role} ${
                                            filters.role === role
                                                ? "border-2 border-primaryRed-600"
                                                : ""
                                        }`}
                                    />
                                ))}
                            </div>

                            <Flag
                                nationality={filters.nationality}
                                onClick={() => setIsNationalityModalOpen(true)}
                                size={6}
                                className="cursor-pointer"
                            />
                        </div>
                        {/* Buttons */}
                        <div className="grid grid-cols-2 gap-4">
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsCreateModalOpen(true)}
                            >
                                Create player
                            </PrimaryButton>
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsGenerateModalOpen(true)}
                            >
                                Generate players
                            </PrimaryButton>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {players.data.length > 0 ? (
                                <PlayerTable
                                    players={players.data}
                                    actions={[
                                        {
                                            icon: "view",
                                            onClick: (player) => {
                                                router.visit(
                                                    route(
                                                        "players.show",
                                                        player.id,
                                                    ),
                                                );
                                            },
                                        },
                                        {
                                            icon: "edit",
                                            onClick: (player) => {
                                                setSelectedPlayer(player);
                                                setIsEditModalOpen(true);
                                            },
                                        },
                                        {
                                            icon: "add",
                                            onClick: (player) => {
                                                setSelectedPlayer(player);
                                                setIsAddModalOpen(true);
                                            },
                                        },
                                        {
                                            icon: "delete",
                                            onClick: (player) => {
                                                setSelectedPlayer(player);
                                                setIsDeleteModalOpen(true);
                                            },
                                        },
                                    ]}
                                />
                            ) : (
                                <div>
                                    <h1 className="mb-4 text-xl font-semibold">
                                        Your world needs its first player
                                    </h1>
                                    <p>
                                        There are no players in your universe
                                        yet. Create one from scratch and shape
                                        its identity, or let the factory
                                        generate players for you to get started
                                        quickly.
                                    </p>
                                </div>
                            )}
                        </div>
                    </div>
                    <Pagination links={players.links} meta={players.meta} />
                </div>
            </div>
            <Modal show={isNationalityModalOpen}>
                <div className="p-6">
                    <h3 className="text-lg font-medium text-primaryRed-600">
                        Nationality
                    </h3>
                    <InputLabel>Select a nationality</InputLabel>
                    <div className="grid grid-cols-4 gap-4 p-4">
                        {[null, ...nationalities].map((nationality) => {
                            return (
                                <Flag
                                    key={nationality ?? "all"}
                                    className="cursor-pointer"
                                    nationality={nationality}
                                    size={8}
                                    onClick={() => {
                                        setQuery((query) => {
                                            return {
                                                ...query,
                                                nationality: nationality,
                                                page: null,
                                            };
                                        });

                                        setIsNationalityModalOpen(false);
                                    }}
                                />
                            );
                        })}
                    </div>
                </div>
            </Modal>
            <Modal show={isCreateModalOpen}>
                <PlayerCreate
                    onSuccess={() => {
                        setIsCreateModalOpen(false);
                    }}
                    onCancel={() => {
                        setIsCreateModalOpen(false);
                    }}
                />
            </Modal>
            <Modal
                show={isGenerateModalOpen}
                onClose={() => {
                    setIsGenerateModalOpen(false);
                }}
            >
                <PlayerGenerate
                    onSuccess={() => {
                        setIsGenerateModalOpen(false);
                    }}
                    onCancel={() => {
                        setIsGenerateModalOpen(false);
                    }}
                />
            </Modal>
            <Modal show={isEditModalOpen}>
                <div>
                    <h1>Edit Player</h1>
                </div>
            </Modal>
            <Modal show={isAddModalOpen}>
                <PlayerAdd
                    player={selectedPlayer}
                    teams={teams}
                    onCancel={() => setIsAddModalOpen(false)}
                    onSuccess={() => setIsAddModalOpen(false)}
                />
            </Modal>
            <Modal show={isDeleteModalOpen}>
                <PlayerDelete
                    player={selectedPlayer}
                    onSuccess={() => {
                        setIsDeleteModalOpen(false);
                    }}
                    onCancel={() => {
                        setIsDeleteModalOpen(false);
                    }}
                />
            </Modal>
        </AuthenticatedLayout>
    );
}
