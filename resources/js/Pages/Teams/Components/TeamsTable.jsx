import Card from "@/Components/Cards/Card";

export default function TeamsTable({ teams }) {
    return (
        <>
            <table>
                {teams.map((team) => (
                    <tr key={team.id}>
                        <td>
                            {team.logo ? (
                                <img className="w-14 h-14" src={team.logo} />
                            ) : (
                                <div
                                    className="w-14 h-14 rounded-full border-2 border-lightGray-600"
                                    style={{
                                        background: `linear-gradient(to right, ${team.first_color} 50%, ${team.second_color} 50%)`,
                                    }}
                                />
                            )}
                        </td>
                        <td>{team.name}</td>
                    </tr>
                ))}
            </table>
            <pre>{JSON.stringify(teams, null, 2)}</pre>
        </>
    );
}
